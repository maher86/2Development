@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') 
<section class="content">
<div class="row">
<div class="col-lg-12 col-xs-12">
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">الصفحات</h3>
                  <a href="{{route('pages.create')}}" class='btn btn-primary btn-sm' style="float: left;margin-left: 50px;"><i class="fa fa-file-text-o" style="padding-left:10px"></i>إنشاء صفحة جديدة</a>
                  
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
                          <form action="{{route('live-search-page')}}" method="get">
                          @method('get')
                          @csrf
                            <label>بحث:<input type="search" class="form-control input-sm" placeholder="" name="q" id="q" aria-controls="example1"></label>
                            <button type="submit" class="btn btn-primary">بحث</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="row"><div class="col-lg-12 col-sm-12">
                      @if(session('status'))
                        <div class="alert alert-danger">
                        {{session('status')}}
                        </div>

                      @endif
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 176px;">معرف الصفحة</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 223px;">عنوان الصفحة</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 205px;">حالة الصفحة</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 400px;">منشي الصفحة</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 400px;">العمليات</th>
                            </tr>
                          </thead>
                          <tbody id="user-table">
                    
                    @foreach($pages as $page)                    
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                       {{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        
                        <td>{{$page->status}}
                        </td>
                        
                        <td>{{$page->user->name}}
                        </td>
                        <td><a href="{{route('pages.edit',$page)}}" class="btn btn-primary btn-sm"><i class="fa  fa-edit" style="padding-left:10px"></i>تحرير</a>
                        @if(Auth::user()->hasRole('super_admin'))
                        <form action="{{ route('pages.destroy', $page) }}" method="POST" style="display:inline-block">
                          @method("DELETE")
                          @csrf
                          <button onclick="return confirm('!هل أنت متأكد من هذا الإجراء ..لا يمكن التراجع عنه؟')" class="btn btn-danger btn-sm"><i class="fa  fa-trash-o" style="padding-left:10px"></i>حذف</button>
                          <!--<a href="#" onclick="return confirm('!هل أنت متأكد من هذا الإجراء ..لا يمكن التراجع عنه؟')" class='btn btn-danger btn-sm'><i class="fa  fa-trash-o" style="padding-left:10px"></i>حذف</a>-->
                        </form>
                        @endif
                        </td>
                        
                      @endforeach
                      
                        
                      </tr></tbody>
                    
                  </table>
                  <div style="margin-right:40%">{{$pages->links()}}</div>
                  </div></div>
                </div><!-- /.box-body -->
              </div>


</div>
</div>
</div>





@endsection