@extends('layouts.admin')
@section('content')
@can('blog_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.blogs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.blog.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.blog.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Blog">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.video') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.user') }}
                        </th> 
                        <th>
                            {{ trans('cruds.blog.fields.type') }}
                        </th>
                   
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $key => $blog)
                        <tr data-entry-id="{{ $blog->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $blog->id ?? '' }}
                            </td>
                            <td>
                                {{ $blog->title ?? '' }}
                            </td>
                            <td>
                                {{ $blog->short_description ?? '' }}
                            </td>
                            <td>
                                @if($blog->photo)
                                    <a href="{{ $blog->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $blog->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($blog->video)
                                    <a href="{{ $blog->video->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $blog->user->name ?? '' }}
                            </td> 
                            <td>
                                {{ App\Models\Blog::TYPE_SELECT[$blog->type] ?? '' }}
                            </td>
                            <td>
                                @can('blog_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.blogs.show', $blog->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('blog_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.blogs.edit', $blog->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('blog_delete')
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('blog_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.blogs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Blog:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
