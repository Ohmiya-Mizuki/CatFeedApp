@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cat </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $cat->name }}
                        </div>
                    </div>
                    <p class="text-center"><a href="{{ route('feed.create', ['cat_id' => $cat->id]) }}">餌の登録へ</a></p>
                    <p class="text-center"><a href="{{ route('sample.mailable.send') }}">メールを送る</a></p>
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('name')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($feedRecords))
                                    @foreach ($feedRecords as $feedRecord)
                                    <tr>
                                        <td>{{$feedRecord->name}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('cat.edit', $cat->id) }}'">
                                {{ __('変更') }}
                            </button>
                            <form style="display:inline" action="{{ route('cat.destroy', $cat->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('削除') }}
                                </button>
                            </form>
                            <a class="btn" role="button" href="{{ route('cat.index') }}
                            ">
                                {{ __('戻る') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection