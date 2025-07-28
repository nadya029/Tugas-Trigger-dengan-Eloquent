@extends('layouts.apps')

@section('title', 'Edit Supplier')

@section('content')
<div class="container">
    <h2>Edit Supplier</h2>

    <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_supplier" class="form-label">Kode Supplier</label>
            <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="{{ $supplier->kode_supplier }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required>
        </div>
        <div class="mb-3">
            <label for="
