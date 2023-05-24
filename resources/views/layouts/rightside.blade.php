<link rel="stylesheet" href="/css/loading.css">

<div class=" d-flex">
    <div class="rside d-none d-lg-block  ">
        <div class="rlogo">
            <a href="/">
                <span class="container material-symbols-outlined">
                    token
                </span>
            </a>
            Page_content
            {{ $user->name }}
        </div>
        <a href="/{{$user->id}}"> 
        <div class="rbtn">
          <span class="material-symbols-outlined"> home </span>الرئيسية 
        </div>
      </a>
        <div class="rbtn">
            <span class="material-symbols-outlined"> Visibility </span>الرؤية
        </div>
        <div class="rbtn">
            <span class="material-symbols-outlined"> Comment </span>الرسالة
        </div>
        <div class="rbtn">
            <span class="material-symbols-outlined"> Ads_Click </span>الأهداف الاستتراتيجة
        </div>
        <div class="rbtn">
            <span class="material-symbols-outlined"> Track_Changes </span>الأهداف التنضيمية
        </div>
        @if (!empty($user->mainpages))
            @foreach ($user->mainpages as $a)
                <a href="{{ $a->Title }}">
                    <div class="rbtn">
                        <span class="material-symbols-outlined"> Feed </span> {{ $a->Title }}
                    </div>
                </a>
            @endforeach
        @else
            {{ 'لم يتم اضافة نشاطات' }}
  
        @endif
        <hr>
  
  
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <div class="rbtn rbtn_s">
                        <a href="{{ url('/')}}"><span class="material-symbols-outlined">Tune</span></a>
                    </div>
                    <div class="rbtn rbtn_s">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <span class="material-symbols-outlined">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="rbtn rbtn_s">
                        <a href="{{ route('login') }}"> <span class="material-symbols-outlined">Tune</span></a>
                    </div>
  
                    @if (Route::has('register'))
                        <div class="rbtn rbtn_s">
                            <a href="{{ route('register') }}"> <span
                                    class="material-symbols-outlined">App_Registration</span></a>
                        </div>
                    @endif
                @endauth
            </div>
        @endif
  
  
  
    </div>