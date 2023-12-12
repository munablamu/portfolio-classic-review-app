@if ( session('feedback.info') )
  <div id="alert" class="fixed bottom-5 mx-5 w-[calc(100%-2.5rem)] sm:m-0 sm:w-auto sm:top-20 sm:right-5 sm:bottom-auto z-50">
    <div class="shadow-lg p-2 bg-indigo-800 items-center text-indigo-50 leading-none rounded-lg flex" role="alert">
      <span class="flex rounded-full bg-indigo-600 uppercase px-2 py-1 text-xs font-bold mr-3">Info</span>
      <span class="font-semibold mr-2 text-left flex-auto">{{ session('feedback.info') }}</span>
    </div>
  </div>

  <style>
    #alert {
      animation: disappear 10s forwards; /* アラートを10秒後に消す */
    }

    @keyframes disappear {
      0%   { opacity: 1; }
      95%  { opacity: 1; }
      100% { opacity: 0; }
    }
  </style>

  <script>
    document.getElementById('alert').addEventListener('animationend', function() {
      this.style.display = 'none';
    });

    // TODO: info, success, error, warningで変数名が違うので注意
    if ( "{{ session('feedback.info') }}" ) {
      const infoIdValue = "{{ uniqid() }}";
      if ( sessionStorage ) {
        if ( sessionStorage.getItem('infoId') === infoIdValue ) {
          document.getElementById('alert').style.display = "none";
        } else {
          sessionStorage.setItem('infoId', infoIdValue);
        }
      }
    }
  </script>
@endif
@if ( session('feedback.error') )
  <div id="alert" class="fixed bottom-5 mx-5 w-[calc(100%-2.5rem)] sm:m-0 sm:w-auto sm:top-20 sm:right-5 sm:bottom-auto z-50">
    <div class="shadow-lg p-2 bg-rose-800 items-center text-rose-50 leading-none rounded-lg flex" role="alert">
      <span class="flex rounded-full bg-rose-600 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
      <span class="font-semibold mr-2 text-left flex-auto">{{ session('feedback.error') }}</span>
    </div>
  </div>

  <style>
    #alert {
      animation: disappear 10s forwards; /* アラートを10秒後に消す */
    }

    @keyframes disappear {
      0%   { opacity: 1; }
      95%  { opacity: 1; }
      100% { opacity: 0; }
    }
  </style>

  <script>
    document.getElementById('alert').addEventListener('animationend', function() {
      this.style.display = 'none';
    });

    // TODO: info, success, error, warningで変数名が違うので注意
    if ( "{{ session('feedback.error') }}" ) {
      const errorIdValue = "{{ uniqid() }}";
      if ( sessionStorage ) {
        if ( sessionStorage.getItem('errorId') === errorIdValue ) {
          document.getElementById('alert').style.display = "none";
        } else {
          sessionStorage.setItem('errorId', errorIdValue);
        }
      }
    }
  </script>
@endif
@if ( session('feedback.success') )
  <div id="alert" class="fixed bottom-5 mx-5 w-[calc(100%-2.5rem)] sm:m-0 sm:w-auto sm:top-20 sm:right-5 sm:bottom-auto z-50">
    <div class="shadow-lg p-2 bg-emerald-800 items-center text-emerald-50 leading-none rounded-lg flex" role="alert">
      <span class="flex rounded-full bg-emerald-600 uppercase px-2 py-1 text-xs font-bold mr-3">Success</span>
      <span class="font-semibold mr-2 text-left flex-auto">{{ session('feedback.success') }}</span>
    </div>
  </div>

  <style>
    #alert {
      animation: disappear 10s forwards; /* アラートを10秒後に消す */
    }

    @keyframes disappear {
      0%   { opacity: 1; }
      95%  { opacity: 1; }
      100% { opacity: 0; }
    }
  </style>

  <script>
    document.getElementById('alert').addEventListener('animationend', function() {
      this.style.display = 'none';
    });

    // TODO: info, success, error, warningで変数名が違うので注意
    if ( "{{ session('feedback.success') }}" ) {
      const successIdValue = "{{ uniqid() }}";
      if ( sessionStorage ) {
        if ( sessionStorage.getItem('successId') === successIdValue ) {
          document.getElementById('alert').style.display = "none";
        } else {
          sessionStorage.setItem('successId', successIdValue);
        }
      }
    }
  </script>
@endif
@if ( session('feedback.warning') )
  <div id="alert" class="fixed bottom-5 mx-5 w-[calc(100%-2.5rem)] sm:m-0 sm:w-auto sm:top-20 sm:right-5 sm:bottom-auto z-50">
    <div class="shadow-lg p-2 bg-amber-800 items-center text-amber-50 leading-none rounded-lg flex" role="alert">
      <span class="flex rounded-full bg-amber-600 uppercase px-2 py-1 text-xs font-bold mr-3">Warning</span>
      <span class="font-semibold mr-2 text-left flex-auto">{{ session('feedback.warning') }}</span>
    </div>
  </div>

  <style>
    #alert {
      animation: disappear 10s forwards; /* アラートを10秒後に消す */
    }

    @keyframes disappear {
      0%   { opacity: 1; }
      95%  { opacity: 1; }
      100% { opacity: 0; }
    }
  </style>

  <script>
    document.getElementById('alert').addEventListener('animationend', function() {
      this.style.display = 'none';
    });

    // TODO: info, success, error, warningで変数名が違うので注意
    if ( "{{ session('feedback.warning') }}" ) {
      const warningIdValue = "{{ uniqid() }}";
      if ( sessionStorage ) {
        if ( sessionStorage.getItem('warningId') === warningIdValue ) {
          document.getElementById('alert').style.display = "none";
        } else {
          sessionStorage.setItem('warningId', warningIdValue);
        }
      }
    }
  </script>
@endif
