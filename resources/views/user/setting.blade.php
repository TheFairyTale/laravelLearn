@extends("layout.main")

@section("content")
<style>
    /*
 * Globals
 */

    /* Links */
    a,
    a:focus,
    a:hover {
        /* color: #fff; */
    }

    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: #333;
        text-shadow: none;
        /* Prevent inheritance from `body` */
        background-color: #fff;
        border: .05rem solid #fff;
    }


    /*
 * Base structure
 */

    html,
    body {
        height: 100%;
        background-color: #fff;
    }

    #body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-pack: center;
        -webkit-box-pack: center;
        justify-content: center;
        /* color: #fff; */
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
        max-width: 42em;
    }


    /*
 * Header
 */
    .masthead {
        margin-bottom: 2rem;
    }

    .masthead-brand {
        margin-bottom: 0;
    }

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
    }

    .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
    }

    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }

        .nav-masthead {
            float: right;
        }
    }


    /*
 * Cover
 */
    .cover {
        padding: 0 1.5rem;
    }

    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
    }


    /*
 * Footer
 */
    .mastfoot {
        color: rgba(255, 255, 255, .5);
    }
</style>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <main role="main" class="inner cover">
        <h1 class="cover-heading">Hi, {{ \Auth::user()->name }}.</h1>
        <form action="/user/me/setting" method="POST" enctype="multipart/form-data">
            <!-- CSRF -->
            @csrf
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" name="name" id="Username" aria-describedby="" placeholder="Please enter your UserName" value="{{ \Auth::user()->name }}">
            </div>
            <div class="custom-file" style="margin-top: 10px;">
                <input placeholder="Click or tap to choose and change your avatar..." name="avatarImg" type="file" class="custom-file-input" id="avatarImg">
                <label class="custom-file-label" value="" for="customFile">Click or tap to choose and change your avatar...</label>
            </div>
            <img class="mr-2" src="{{ \Auth::user()->avatar }}" alt="" alt="Your avatar">
            <br />
            <button type="submit" class="">Save change</button>
            <hr />
        </form>
        <button onclick="history.go(-1)" type="submit" class="">Back</button>
    </main>
</div>
@endsection