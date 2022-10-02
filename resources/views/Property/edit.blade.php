@extends('property.master')

@section('content')
<div class="container my-3">
<h1>Formulário de edição: Imóveis</h1>

<?php

// aqui é um array, (os valores estao no indice 0, só podem ser acessado através do indice 0)
$property = $property[0];

?>
<form action="<?= url('/imoveis/update', ['id'=>$property->id]); ?>" method="post">

   <?= csrf_field(); ?>
   <?= method_field('PUT'); ?>

<div class="form-group">
    <label for="title">Titulo do imóvel</label>
    <input type="text" name="title" id="title" value="<?= $property->title?>" class="form-control">
</div>

  <div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control"><?= $property->descriptions?></textarea>
  </div>

<div class="form-group">
    <label for="rental_price">Valor de locação</label>
    <input type="text" name="rental_price" id="rental_price" value="<?= $property->rental_price?>" class="form-control">
</div>

<div class="form-group">
    <label for="sale_price">Valor de compra</label>
    <input type="text" name="sale_price" id="sale_price" value="<?= $property->sale_price?>" class="form-control">
</div>

    <button class="btn btn-primary" type="submit">Atualizar imóvel</button>

</form>
</div>
@endsection