
@include('sections.head')
<style>
    .__login {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: grid;
        align-items: center;
        justify-content: center;
    }
    .__login-area {
        width: 500px;
        height: 520px;
        padding-bottom: 50px;
        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2); 
        border-radius: 5px;
        position: relative;
        z-index: 1;
        background: #ddd;
        overflow: hidden;
        display: grid;
        align-items: center;
        justify-items: center;
        font-family: sans-serif;
    }
    .__login-area form {
        width: 60%;
    }
    .__form {
        display: grid;
        color: var(--color);
        margin-bottom: 50px;
    }
    .__form label {
        font-family: sans-serif;
        margin-bottom: 10px;
    }
    .__form input {
        padding: 5px;
        border: 1px solid #000;
        background: unset;
        color: var(--color);
    }
    .__form input:focus-visible {
        outline: 0;
    }
    .__form input:focus {
        --tw-ring-shadow: unset;
    }
    .__login-area button {
        margin-bottom: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 40px;
        background: #000;
        border: 1px solid var(--color);
        font-size: 16px;
        color: #fff;
        cursor: pointer;
    }
    .__login-area button:hover {
        background: #000;
        color: var(--color);
        border: 1px solid var(--color);
    }
    .__remember {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 25px;
    }
    .__remember input {
        margin: 0;
    }
    .__remember span {
        color: var(--color);
        margin: 0 0 0 10px;
        padding: 0;
    }
    .__forgot {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    .__forgot a {
        color: var(--color);
        text-decoration: none;
    }
    .__forgot a:hover {
        color: aqua;
    }
    .__logo {
        top: unset;
        left: unset;
    }
</style>
<div class="__login">
    <div class="__login-area">
        <div class="__logo">
            <span>TO DO LIST</span>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="__form">
                <label for="email">E-Mail</label>
                <input type="text" name="email" required autofocus>
            </div>
            <div class="__form">
                <label for="password">Şifre</label>
                <input type="password" name="password" required autocomplete="current-password">
            </div>
            <button type="submit">
                {{ __('Giriş Yap') }}
            </button>
            <div class="__forgot">
                <a href="{{ route('register') }}">
                    {{ __('Hesabınız yok mu ?') }}
                </a>
            </div>
        </form>
    </div>
</div>
