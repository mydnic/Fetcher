@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            {!! link_to_route('admin.source.create', 'Add a news feed', [], ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Website URL</th>
                        <th>Feed URL</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sources as $source): ?>
                        <tr>
                            <th scope="row">
                                {{ $source->id }}
                            </th>
                            <td>
                                {!! link_to_route('admin.source.edit', $source->name, $source->id) !!}
                            </td>
                            <td>
                                {{ $source->website_url }}
                            </td>
                            <td>
                                {{ $source->feed_url }}
                            </td>
                            <td>
                                {{ $source->articles()->count() }}
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
@stop