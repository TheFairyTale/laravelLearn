<?php

namespace App;

// 继承时使用App/Model
use App\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;

// 表users
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 获取用户文章列表
    public function posts() {
        return $this->hasMany(\App\Post::class, 'user_id', 'id');
    }

    // 关注我的
    // 获取star id 为当前用户的
    public function fans() {
        // hasMany(我要关联的 对象 ,  对象 里面的外键, 当前模型的主键)
        return $this->hasMany(\App\Fan::class, 'star_id', 'id');
    }

    // 我关注的
    public function stars() {
        return $this->hasMany(\App\Fan::class, 'fan_id', 'id');
    }

    // 我要关注某人
    public function doFan($uid) {
        // 从我关注的列表中增加一则信息并保存
        // $this->stars() 我关注的人
        // save() 保存一个模型(?)
        // new \App\Fan() 构建一个新的粉丝模型
        // star_id 被关注人id
        $fan = new \App\Fan();
        $fan->star_id = $uid;
        // 保存
        return $this->stars()->save($fan);
    }

    // 取消关注
    /*
    public function doUnFan($uid) {
        $fan = new \App\Fan();
        $fan->star_id = $uid;
        // 删除
        return $this->stars()->delete($fan);
        // 以上操作不起作用, 或者说, 会在fans 表中删掉fan_id 为当前用户id 的一切记录
    }
    */
    public function doUnFan($star_uid, $user_id) {
        $fan = new \App\Fan();
        $fan->star_id = $star_uid;
        //return dd($this);
        // 删除
        //return $this->stars()->where('star_id', '=', $uid)->delete();
        //return dd($this->stars()); //->where('star_id', '=', 2);
        //$result = DB::delete("select * from fans where fan_id = ".$user_id." and star_id = ".$star_uid.";");
        //dd($result);
        // 以上的数据库操作不起作用, 或者说, 会在fans 表中删掉fan_id 为当前用户id 的一切记录
        $result = DB::table('fans')->where([
            ['fan_id', $user_id], 
            ['star_id', $star_uid], 
            ])->delete();
        return $result;
    }

    // 当前用户是否被某uid 关注
    public function hasFan($uid) {
        // $this->fans() 获取当前用户的所有粉丝
        // count() 返回个数
        return $this->fans()->where(
            'fan_id',
            $uid
        )->count();     // 有则返回正整数, 无则为 0
    }

    // 当前用户是否关注了uid
    public function hasStar($uid) {
        return $this->stars()->where(
            'star_id',
            $uid
        )->count();
    }
}
