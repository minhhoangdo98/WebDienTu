@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
        <!-- danh muc dien thoai -->
        <div class="panel-heading">
              <h3 class="panel-title text-left" style="font-size: 28px; color: #81DAF5;  border-radius: 25px; background-color: #E0F8F7; padding: 20px;  margin-left: -20px; margin-right: -20px;">Sản phẩm mới về</h3>
            </div>
        <h3 class="panel-title text-left" style="font-size: 22px; margin-left: 20px;color: #81DAF5; margin-top: 10px; margin-bottom: 10px; ; border-bottom: 2px solid #81DAF5;">Điện thoại</h3>
        <?php 
          $mobile = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->orderBy('products.created_at', 'desc')
                ->paginate(4); 

        ?>
        @foreach($mobile as $row)        
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li> 
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('mobile/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                  <span class="label label-info">Ưu đãi khi mua</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li>
                  <span class="label label-warning">Cấu Hình Nổi bật</span> 
                  <li><strong>CPU</strong> : <i> {!!$row->cpu!!}</i></li>
                  <li><strong>Màn Hình</strong> : <i>{!!$row->screen!!} </i></li> 
                  <li><strong>Camera</strong> : Trước  <i>{!!$row->cam1!!}</i> Sau <i>{!!$row->cam2!!} </i></li> 
                  <li><strong>HĐH</strong> :<i> {!!$row->os!!} </i> <strong> Bộ nhớ trong</strong> :<i> {!!$row->storage!!} </i></li> 
                  <li><strong>Pin</strong> :<i> {!!$row->pin!!}</i></li>
                </a>
              </div>
                <span class="btn label-warning"><strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc dien thoai -->
       
          <div class="clearfix">            
          </div>

        <!--========================== phan danh muc laptop   =========================================  -->
          <div id="laptop">
          <h3 class="panel-title text-left" style="font-size: 22px; margin-left: 20px; margin-top: 10px; margin-bottom: 10px; color: #81DAF5; border-bottom: 2px solid #81DAF5;">Laptop</h3>
          <?php 
          $lap = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->orderBy('products.created_at', 'desc')
                ->paginate(4); 

        ?>
          @foreach($lap as $row)
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding" >
            <div class="thumbnail">          
              <div class="hienthi">
                <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="img responsive">
                <div class="caption">
                  <h1><small><strong class="title-pro">{!!$row->name!!}</strong></small></h1>
                  <p>    
                      <li><i>{!!$row->intro!!}</i></li>             
                      <span class="label label-info ">Ưu đãi khi mua</span>
                      <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                      <li> <span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li>
                      <li> <span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li>
                  </p>
                  <p>
                    <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                  </p>
                </div>
              </div>
              <div class="tomtat">
                <div class="thongtin">
                  <a href="{!!url('laptop/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                    <span class="label label-info ">Ưu đãi khi mua</span>   
                    <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                    <li><span class="glyphicon glyphicon-hand-right"></span> T{!!$row->promo2!!}</li> 
                    <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li>
                    <span class="label label-warning">Cấu Hình Nổi bật</span> 
                    <li><strong>CPU</strong> : <i>{!!$row->cpu!!}</i></li>
                    <li><strong>RAM </strong> : <i>{!!$row->ram!!}</i></li>
                    <li><strong>Lưu Trữ</strong> : <i> {!!$row->storage!!}</i></li>
                    <li><strong>Màn Hình</strong> : <i> {!!$row->screen!!} </i></li> 
                    <li><strong>VGA</strong> : <i> {!!$row->vga!!}</i></li> 
                    <li><strong>HĐH</strong> :<i> {!!$row->os!!}</i></li> 
                    <li><strong>Pin</strong> :<i> {!!$row->pin!!}</i></li>
                  </a>
                </div>                
                  <div class="price">  
                    <span class="btn btn-info btn-block ">Giá : <strong>{!!$row->price!!}</strong> Đ</span>   
                    <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success btn-block">Thêm vào giỏ</a> 
                  </div>                  
              </div> 
            </div>
          </div>
        @endforeach
        <div class="clearfix">
        </div>
          
<!-- =============== danh muc may tinh ===================================== -->
        <div id="pc">
        <h3 class="panel-title text-left" style="font-size: 22px; margin-left: 20px; margin-top: 10px; margin-bottom: 10px; color: #81DAF5; border-bottom: 2px solid #81DAF5;">Máy tính bàn</h3>
        <?php 
          $pc = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','19')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->orderBy('products.created_at', 'desc')
                ->paginate(4); 

        ?>
        @foreach($pc as $row)
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
            <div class="thumbnail pc">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-pc">{!!$row->name!!}</small></h1>
                  <li> CPU: {!!$row->cpu!!}</li>
                  <li> RAM :{!!$row->ram!!}</li>
                  <li>HDD : {!!$row->storage!!} </li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!} </li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!} </li> 
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('pc/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">                   
                  <span class="label label-warning">Cấu hình chi tiết</span> 
                  <li><strong>CPU</strong> : <i>  {!!$row->cpu!!}</i></li>
                  <li><strong>HDD</strong> : T<i> {!!$row->storage!!}</i></li> 
                  <li><strong>HĐH</strong> :<i{!!$row->os!!}  </i> - <strong>RAM </strong> :<i>{!!$row->ram!!}</i></li> 
                  <li><strong>VGA - DVD</strong> :<i> {!!$row->vga!!}</i></li>
                  <li><strong>Kết nối</strong> : <i> {!!$row->connect!!}</i></li> 
                </a>
              </div>
                <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 item products -->
        @endforeach   
         <div class="clearfix">
        </div>

        </div> <!-- /col 12 -->   
        </div>  

        <img src="uploads/products/poster-footer.jpg" alt="Hosting Miễn Phí" border="0" width="100%" height="300" />
          
@endsection
