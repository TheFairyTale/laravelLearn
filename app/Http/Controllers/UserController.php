<?php

namespace App\Http\Controllers;

use App\Post;
// 指定User 类为自创建的类
use App\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\json_encode;

class UserController extends Controller
{
    // User setting page
    public function setting(Post $post)
    {
        $user = \Auth::user();
        //dd($user);
        return view('user.setting', compact(['post', 'user']));
    }
    // User setting store
    public function settingStore(Request $request)
    {
        // 验证
        $this->validate(request(), [
            'name' => 'required|min:3|max:32',
        ]);

        // 逻辑
        $name = request('name');
        $user = \Auth::user();
        if ($name != $user->name) {
            if (User::where('name', $name)->count() > 0) {
                return back()->withErrors('用户名已被占用');
            }
            $user->name = $name;
        }

        //dd(request());
        // https://blog.csdn.net/qq_32723451/article/details/94721729
        // https://blog.csdn.net/qq_27516777/article/details/79723057
        //$fileName = $request->file('avatarImg');
        //$newImage = request('avatarImg')->face->store($fileName, 'face');
        //        $file = $request->getBasePath();
        //dd(Storage::url ($newImage));
        //Storage::putFile();
        //$storaged = Storage::disk('local')->put($fileName,$resource);
        //dd($fileName);
        //dd(Storage::url($fileName));
        //$result = $request->image->store('images', 'public');
        // store(要存储到的文件夹名)
        $result = $request->file('avatarImg')->store("/"); //$request->headers; 
        //dd($result);

        //if ($result->isValid()) {
        // 获取扩展名
        //$ext = $result->getClientOriginalExtension();
        /*
        if ($ext != "jpg" || $ext != "jpeg" || $ext != "png" || $ext != "gif" || $ext != "jfif" || $ext != "jpe") {
            return back()->isInvalid(); //"Upload error. not a picture.";
        }
        */
        // 获取绝对路径
        //$path = $result->getRealPath();
        // 重命名
        //$filename = date('Y-m-d-h-i-s').'.'.$ext;
        // TODO 哈希可能导致性能问题
        //$filename = bcrypt($result->getClientOriginalName()) . '.' . $ext;
        // 存储文件 调用disk 模块中 uploads
        //Storage::disk('uploads')->put($result->, file_get_contents($path));

        //$file = $request->file('avatarImg');
        //->store($user->id);
        //$user->avatar = "/storage/" . $path;
        //}
        // 保存图像地址到avatar 值中, 加上/storage/ 是用于能从链接访问
        $user->avatar = "/storage/".$result;
        $user->save();

        // 渲染
        return back();
    }

    // 个人中心页面
    public function show(User $user)
    {
        // 获取个人信息
        // 用户名
        // 头像
        // 关注, 粉丝, 文章
        // 直接传入$user 就可以获取用户信息，但要想显示关注/粉丝等的数量，就需要withCount()
        // 而withCount() 只能在数据库相关查找函数后使用，比如 "where()->withCount()"或
        // "orderBy()->withCount()" 等诸如此类
        // 所以不能直接使用, 需要重新定义一下User 模型， 使用find() 函数即可，和使用$user
        // 获取的结果是一样的
        //stars fans posts 都是在App\User 类中创建的关联(类中的那几个函数)
        $user = User::withCount(['stars', 'fans', 'posts'])
            ->find($user->id);

        // 该用户的文章列表, 要只取创建时间最新的前10 条
        //
        // orderBy(要排序的字段, 排序方法) desc 是倒序排序。
        // take(int) 限制结果的返回数量, skip(int) 跳过指定数量的结果, 此处take(10) 是
        // 限制取出前十条结果
        // get() 用于获取结果
        $post = $user->posts()
            ->orderBy('created_at', 'desc')
            //->take(10)
            ->get();

        // following
        // 该用户关注的用户, 返回该用户关注的每一个用户的信
        // 息: 用户名, 关注, 粉丝，文章
        $stars = $user->stars;
        $susers = User::whereIn('id', $stars->pluck('star_id'))
            ->withCount(['stars', 'fans', 'posts'])
            ->get();

        // fans
        // 该用户的粉丝，返回该账户粉丝的 用户名，关注, 粉
        // 丝 文章数
        // $user->fans 获取的是这个用户的所有fans （粉丝）
        $fans = $user->fans;
        // User获取的id 都在$fans 中. 首先获取fans 模型，然后
        // whereIn(字段值所在列名, 数组) 验证字段的值必须存在指定的数组
        // pluck(列名) 获取包含单列值的集合
        // 然后将粉丝 fan_id 作为数组获取出来， 然后用User::whereIn() 即可获取出该用户所
        // 有的粉丝
        // withCount() 出指定的数据stars fans posts
        $fusers = User::whereIn('id', $fans->pluck('fan_id'))
            ->withCount(['stars', 'fans', 'posts'])
            ->get();

        //

        //$user->avatar = "/storage/ProfilePhoto.jpg";

        return view('user/show', compact(['post', 'user', 'susers', 'fusers']));
    }

    // follow user
    public function fan(User $user)
    {
        $currentUser = \Auth::user();
        $currentUser->doFan($user->id);

        return json_encode([
            'error' => 0,
            'msg' => 'Following',
            'following' => true,
        ]);
    }

    // unfollow user
    public function unfan(User $user)
    {
        // \Auth::user() 返回的是当前已登陆认证通过的用户
        $currentUser = \Auth::user();
        // 返回的是删除的数目
        $currentUser->doUnFan($user->id, $currentUser->id);
        //dd($user->stars());


        return json_encode([
            'error' => 0,
            'msg' => 'Unfollowed',
            'following' => false,
        ]);
    }
}
