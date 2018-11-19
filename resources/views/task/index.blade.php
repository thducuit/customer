@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Email Task</div>

                <div class="panel-body">
                	<table id="task-table" class="table table-stripe table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Thứ tự</th>
                                <th>Danh mục</th>
                                <th>Tiêu đề</th>
                    			<th>Email</th>
                    			<th>Tình trạng</th>
                                <th>Gửi lại</th>
                                <th>Ngày gửi</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                            @php
                                $count = 0;
                            @endphp
                    		@foreach($email_tasks as $email_task)
                    		@php
                                if($email_task->status== \App\MailTask::STATUS_WAITING){
                                    $color='warning';
                                    $status='Đang đợi';
                                }else if($email_task->status== \App\MailTask::STATUS_RUNNING){
                                    $color='info';
                                    $status='Đang gửi';
                                }else if($email_task->status== \App\MailTask::STATUS_FAILURE){
                                    $color='danger';
                                    $status='Lỗi';
                                }else if($email_task->status== \App\MailTask::STATUS_DONE){
                                    $color='success';
                                    $status='Hoàn thành';
                                }
                                else{
                                    $status=null;
                                }
                            @endphp
                    		<tr>
                                <td>{{ ++$count }}</td>
                    			<td>{!! \App\Helpers\Utils::getCategoryTitle($email_task->category_ids) !!}</td>
                                <td>{{ $email_task->title }}</td>
                                <td>{{ $email_task->email }}</td>
                    			<td><span class = "label label-{{ $color }}">{{ $status }}</span></td> 
                                <td>
                                    <a href="#" class="btn-refresh" data-action="{{ url('/tasks/refresh') }}" data-method="refesh" data-id="{{ $email_task->id }}"><span class="glyphicon glyphicon-refresh"></span></a>
                                </td>
                    			<td>
                                    {{ date('d-m-Y H:i:s', strtotime($email_task->created_at)) }}       
                                </td>
                                <td>
                                <a href="#" class="btn-delete" data-action="{{ url('/tasks/delete') }}" data-method="delete" data-id="{{ $email_task->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
                                </td>
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection