@extends('errors::minimal')

@section('title', __('Yetki Yok'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Bu sayfaya Yetkiniz Yok'))
