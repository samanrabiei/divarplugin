@extends('webapp_layout.master')
@section('content')
    <section id="toast" class="info">
        <div id="icon-wrapper">
            <div id="icon"></div>
        </div>
        <div id="toast-message">
            <h4>Status</h4>
            <p>Descriptive Message.</p>
        </div>
        <button id="toast-close"></button>
        <div id="timer"></div>
    </section>


    <main>
        <h1>Toast Notifications</h1>
        <p>Select a button to trigger the different types of toast notifications:</p>
        <button id="successBtn" onclick="openToast('success')">Success</button>
        <button id="warningBtn" onclick="openToast('warning')">Warning</button>
        <button id="errorBtn" onclick="openToast('error')">Error</button>
        <button id="infoBtn" onclick="openToast('info')">Info</button>
    @endsection
