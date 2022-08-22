<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/listcv.css')}}">
</head>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<h2>DANH SÁCH CÁC UV ĐÃ CONFIRM </h2>
<div class="table-wrapper">
    <table class="fl-table">

        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Vị trí</th>
                <th>Ngày phỏng vấn</th>
                <th>Phone</th>
              
                
               
            </tr>
        </thead>
      
        <tbody>
            <?php
           // $stt=1;
         //   for($i=1;$i<=sizeof($CVS);$i++){ 
            ?>
            @foreach($confirms as $key => $confirm)
            <tr>
                <td> {{ $key+1 }}</td>
                <td> {{ $confirm->name }}</td>
                <td> {{ $confirm->position }} </td>
                <td> {{ $confirm->dateinterview }}</td>
                <td> {{ $confirm->phone }}</td>
              
                

            </tr>
            <?php
         //   $stt++;
            
        ?>



            @endforeach
        </tbody>
    </table>
</div>