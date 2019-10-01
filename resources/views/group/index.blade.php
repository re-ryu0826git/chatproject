{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'チャットグループ一覧'を埋め込む --}}
@section('title', 'チャット一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <h2>チャット一覧</h2>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">チャットグループ名</th>
                  <th scope="col">詳細</th>
                  <th scope="col">Last Comment Time</th>
                  <th scope="col">Leave the group</th>
                </tr>
              </thead>
              <tbody>
                @foreach($groups as $group) 
                    <tr>
                      @if (empty($group))
                        <p>グループはまだ作成されていません</p>
                      @else
                        <th scope="row">{{ $group->id }}</th>
                          <td class = "group_title">{{ $group->name }}</td>
                          <td>
                            <div>
                              {{-- GroupController show チャット投稿画面へ  --}}
                              <a class="btn btn-success" href="{{ url('groups/'.$group->id)}}" role="button">チャット画面へ</a>
                            </div>
                          </td>
                          <!--created_at キーを指定してvalueを返す-->
                          @if (empty($group->comments->last()['created_at']))
                            <td>コメントの投稿はまだありません</td>
                          @else
                            <td>{{ $group->comments->last()['created_at']->format('Y年m月d日 H時i分') }}</td>
                          @endif
                          <td>
                            <div>
                              <a class="btn btn-secondary" href="{{ url('groups/'.$group->id.'/delete') }}" role="button">Exit</a>
                            </div>
                          </td>
                      @endif
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
@endsection






