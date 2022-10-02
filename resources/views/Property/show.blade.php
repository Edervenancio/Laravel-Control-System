@extends('property.master')

@section('content')
<div class="container my-3">
<h1>Página Single</h1>
<?php


if (!empty($property)) {
    foreach ($property as $prop) {
?>

        <h2>Título do Imóvel <?= $prop->title; ?></h2>

        <p>Descrição <?= $prop->descriptions; ?> </p>

        <p>Valor de locação <?= $prop->rental_price; ?> </p>

        <p>Valor de venda <?= $prop->sale_price; ?></p>
<?php
    }
}
?>
</div>
@endsection

 