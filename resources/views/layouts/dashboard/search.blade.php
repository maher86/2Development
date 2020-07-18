@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<!-- @if (session('status'))
    <div class="alert alert-success"style="position: absolute;
    margin-left: 20px;
    /* margin-top: -16px; */
    float: left;
    width: 500px;
    text-align: center;z-index:1001">
        {{ session('status') }}
    </div>
    
@endif -->
<div class="row" style="margin-right:15px;margin-left:15px">
<div class="col-xs-12">
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">المستخدمون</h3>
                  <a href="{{route('showForm')}}" class='btn btn-primary btn-sm' style="float: left;margin-left: 50px;"><i class="fa fa-user-plus" style="padding-left:10px"></i>إضافة مستخدم جديد</a>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                      <!-- <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                          <label>عرض 
                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                            </select> مستخدمين في كل صفحة</label>
                          </div>
                        </div> -->
                        <div class="col-sm-6">
                          <div id="example1_filter" class="dataTables_filter">
                          @method('GET')
                          @csrf
                            <label>بحث:<input type="search" class="form-control input-sm" placeholder="" id="search-user" aria-controls="example1"></label>
                          </div>
                        </div>
                      </div>
                      <div class="row"><div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 176px;">الإسم</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 223px;">البريد الإلكتروني</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 205px;">الصلاحيات</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 400px;">العمليات</th></tr>
                          </thead>
                          <tbody id="user-table">
                    
                    </tbody>
                    
                  </table>
                  <div style="margin-right:40%">{{$users->links()}}</div>
                  </div></div>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>
 </div>

 <!-- <script type="text/javascript">
$('#search-user').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{route('searchForUser')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script> -->

@endsection