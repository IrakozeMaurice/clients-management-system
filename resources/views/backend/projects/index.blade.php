@extends('layouts.app')
@section('pageTitle', 'Projects')
@section('content')
    <div class="col-lg-12">
        <a href="/projects/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New project</a>
        <h1 class="h4">Projects</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table  table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Client Names</th>
                        <th class="text-center">Assigned To</th>
                        <th class="text-center">Percentage</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="text-center"><a href="/projects/{{ $project->id }}">{{ $project->id }}</a></td>
                            <td><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></td>
                            <td><a href="/projects/{{ $project->id }}">{{ substr($project->description, 0, 20) }}</a>
                            </td>
                            <td>{{ $project->client->firstname }}
                                {{ $project->client->lastname }}</td>
                            <td>{{ $project->assigned_To->firstname }}
                                {{ $project->assigned_To->lastname }}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        aria-valuenow="{{ $project->percentage }}" aria-valuemin="0" aria-valuemax="100"
                                        style="width:{{ $project->percentage }}%;min-width: 45%;">
                                        {{ $project->percentage }}%
                                    </div>
                                </div>
                            </td>
                            <td><a href="/projects/{{ $project->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>

                                <form action="/projects/{{ $project->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="btn btn-light btn-outline-danger text-dark btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
