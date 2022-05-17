@extends('template')

@section('page_contents')
	<div class="row justify-content-center">
		<div class="col-sm-4">
			<div class="card shadow">
				<div class="card-body p-0">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">Post</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">Video</button>
					  </li>
					</ul>
					<div class="tab-content p-2" id="myTabContent">
					  <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
					  	<post-add-component></post-add-component>
					  </div>
					  <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
					  	<video-add-component></video-add-component>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<wall-list-component></wall-list-component>
		</div>
	</div>
@endsection