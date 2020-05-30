@extends('website.backend.layouts.main')
@section('content')
<div class="x_panel">
    <div class="x_title">
    <h2>Basic Tables <small>basic table subtitle</small></h2>
    <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Settings 1</a>
    <a class="dropdown-item" href="#">Settings 2</a>
    </div>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
    </ul>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <table class="table">
    <thead>
    <tr>
    <th>#</th>
    <th>Title</th>
    <th>Document1</th>
    <th>Document2</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($document as $documents )


    <tr>
    <th scope="row">1</th>
    <td>{{$documents->title}}</td>
    <td>{{$documents->document1}}</td>
    <td>{{$documents->document2}}</td>
    </tr>
    @endforeach


    </tbody>
    </table>
    </div>
    </div>
    </div>
  </div>
@endsection

