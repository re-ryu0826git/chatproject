@extends('layouts.top')

@section('title', 'Chatアプリトップページ')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>chatアプリガイド</h2>
            </div>
            <div class="card-body">
                <article>
                    <section>
                    <h3>chatアプリについて</h3>
                        <figure>
                            <figcaption>共通の話題を持ちたい人、気軽に投稿したい向けのチャットサイトです。</figcaption>
                        </figure>
                    </section>
                    <h3>使用方法</h3>
                    <section>
                        <figure>
                            <figcaption>①ユーザ登録を実施する</figcaption>
                        </figure>
                        <figure>
                            <figcaption>②登録したユーザでログインする。</figcaption>
                        </figure>
                        <figure>
                            <figcaption>③自分が作りたいチャットグループを作成する。※チャットグループを必ず作成する必要はありません。</figcaption>
                        </figure>
                        <figure>
                            <figcaption>④「グループ一覧」から投稿したいグループの「チャット画面へ」のボタンをクリックして投稿画面へリンク。</figcaption>
                        </figure>
                        <figure>
                            <figcaption>⑤書き込み欄にメッセージを入力し「Send」ボタンをクリックして投稿できる。</figcaption>
                        </figure>
                        <figure>
                            <figcaption>⑥グループから抜けたい時は「グループ一覧」から「Exit」ボタンをクリックする。</figcaption>
                        </figure>
                    </section>
                </article>
                <div class="ribbon">
                    <h4>よかったら是非使ってみてください。</h4>
                </div>
            </div>
        </div>
    </div>
@endsection 