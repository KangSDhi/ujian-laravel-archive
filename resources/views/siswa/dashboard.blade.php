@extends('siswa.layouts.layout')

@section('title', $title)

@section('content')
    <main class="col py-3">
        <section>

        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card text-bg-primary">
                            <div class="card-header">
                                <h4>Kelas</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    {{ $user->kelas }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection