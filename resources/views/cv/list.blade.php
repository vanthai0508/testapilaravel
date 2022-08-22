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
<h2>DANH SÁCH CÁC CV</h2>
<div class="table-wrapper">
    <table class="fl-table">

        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Vị trí</th>
                <th>Ngày apply</th>
                <th>Phone</th>
                <th>CV</th>
                
                <th>Reject or approve</th>
            </tr>
        </thead>
      
        <tbody>
            <?php
           // $stt=1;
         //   for($i=1;$i<=sizeof($CVS);$i++){ 
            ?>
            @foreach($cvs as $key => $cv)
            <tr>
                <td> {{ $key+1 }}</td>
                <td> {{ $cv->name}}</td>
                <td> {{ $cv->position}} </td>
                <td> {{ $cv->created_at }}</td>
                <td> {{ $cv->phone }}</td>
                
                <td> <img src="../cv/{{ $cv->file }}"> </td>
                
                <td>
                    <a href="/cv/{{ $cv->id }}/reject" class="button">Reject</a>
                    <a href="/cv/{{ $cv->id }}/{{ $cv->id_user }}/approve" class="button">Approve</a>
                </td>

            </tr>
            <?php
         //   $stt++;
            
        ?>



            @endforeach
        </tbody>
    </table>
</div>