
</div>
<footer class="main-footer">
        <div class="pull-left hidden-xs">
          
        </div>
        
      </footer>


      <!-- jQuery 2.1.4 -->
    

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{asset('dashboard/bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!--upload avatar-->
    <script>
      @if(session('success'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('success')}}',
        timeout: 2000,
        }).show();
      @endif
      @if(session('adding user'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('adding user')}}',
        timeout: 2000,
        }).show();
      @endif
      @if(session('deleting user'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('deleting user')}}',
        timeout: 2000,
        }).show();
      @endif
      @if(session('profile updated'))
        new Noty({
        type: 'warning',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('profile updated')}}',
        timeout: 2000,
        }).show();
      @endif

      @if(session('page created'))
        new Noty({
        type: 'warning',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('page created')}}',
        timeout: 2000,
        }).show();
      @endif
      @if(session('video created'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('video created')}}',
        timeout: 2000,
        }).show();
      @endif
      @if(session('draft video'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('draft video')}}',
        timeout: 2000,
        }).show();
      @endif
      
      @if(session('draft page'))
        new Noty({
        type: 'warning',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('draft page')}}',
        timeout: 2000,
        }).show();
      @endif


      @if(session('create_category'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('create_category')}}',
        timeout: 2000,
        }).show();
      @endif

      @if(session('delete_cat'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('delete_cat')}}',
        timeout: 2000,
        }).show();
      @endif

      @if(session('update_category'))
        new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        theme: 'mint',
        text: '{{session('update_category')}}',
        timeout: 2000,
        }).show();
      @endif
</script>
    <script>
    function doAfterSelectImage(input){
      readURL(input);
      uploadUserAvatar();
    }
    function readURL(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#user-avatar').attr('src', e.target.result );
        };
        // $('#user-avatar').attr('src', input.value );
        reader.readAsDataURL(input.files[0]);      
      }
    }
    function uploadUserAvatar(){
      let myform = document.getElementById('user_avatar_form');
      let formData = new FormData(myform);
      $.ajax({
        type:'post',
        data:formData,
        dataType:'JSON',
        contentType:false,
        cache:false,
        processData:false,        
        url:"{{route('dashboard.showUserProfile',Auth::id())}}",
        success:function(response){
          if(response== 200){
            $('#notifDiv').fadeIn();
            $('#notifDiv').css('background','green');
            $('#notifDiv').text('your Avatar is updated');
            setTimeout(() => {
              $('#notifDiv').fadeOut();
            }, 3000);
          }else if (response == 700){
            $('#notifDiv').fadeIn();
            $('#notifDiv').css('background','red');
            $('#notifDiv').text('there is wrong');
            setTimeout(() => {
              $('#notifDiv').fadeOut();
            }, 3000);

          }
        }
      })
    }
    
    </script>
    <script >
    $(document).ready(function () {
    $(".alert").fadeIn(3000).delay(3000).fadeOut(2000);
    $('.edit_form').submit(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("يجب أن تختار صلاحية واحدة على الأقل");
        return false;
      }

    });
    });

  
</script>
    




    <!-- Morris.js charts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>-->
    <script src="{{asset('dashboard/plugins/morris/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('dashboard/plugins/knob/jquery.knob.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('dashboard/dist/js/moment.js')}}"></script>
    <script src="{{asset('dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('dashboard/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('dashboard/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('dashboard/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboard/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dashboard/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dashboard/dist/js/demo.js')}}"></script>
  </body>
</html>
