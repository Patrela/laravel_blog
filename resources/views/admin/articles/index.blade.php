@extends('adminlte::page')
@section('title', 'Articles')
@section('content-header')
    <h2>Articles</h2>
@endsection

@section('content')
{{-- <pre>
    @dump(session('success_message'))
</pre> --}}
    @if(session('success_message'))
        <div class="alert alert-info">
            {{session('success_message')}}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('articles.create')}}">Create</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ Str::limit($article->title,25, '...')}}</td>
                            <td>{{$article->category->name}}</td>
                            <td>
                                <input type="checkbox" name="status" id="status" class="form-check-input ml-4"
                                disabled {{ $article->status? "checked" : ""}}>
                            </td>

                            <td width="2px"><a href="{{route('articles.show',$article )}}"
                                    class="btn btn-primary btn-sm mb-2">Show</a></td>

                            <td width="5px"><a href="{{route('articles.edit',$article )}}"
                                    class="btn btn-primary btn-sm mb-2">Edit</a></td>

                            <td width="5px">
                                <form action="{{route('articles.destroy',$article )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="text-center mt-3">
                {{$articles->links()}}
            </div>
        </div>
    </div>
@endsection
