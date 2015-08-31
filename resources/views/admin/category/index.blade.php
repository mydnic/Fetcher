@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            {!! link_to_route('category.create', 'Add a category', [], ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Feed assigned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <th scope="row">
                                {{ $category->id }}
                            </th>
                            <td>
                                {!! link_to_route('category.edit', $category->name, $category->id) !!}
                            </td>
                            <td>
                                {{ $category->sources()->count() }}
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
@stop