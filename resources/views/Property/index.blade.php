@extends('property.master')

@section('content')
<div class="container my-3">
<h1>Listagem de produtos</h1>


<?php



if(!empty($properties)){


    echo "<table class='table table-striped table-hover'>";
    echo "<thead class='bg-primary text-white'>
            <td>Título</td>
            <td>Valor de locação</td>
            <td>Valor de compra</td>
            <td>Ações</td>
         </thead>";

    foreach($properties as $property){

        $linkReadMode = url('/imoveis/' . $property->name_url);
        $linkEditItem = url('/imoveis/editar/' . $property->name_url);
        $linkRemoveItem = url('/imoveis/remover/' . $property->name_url);

        echo "<tr>
                 <td> [ $property->title ] </td>
                 <td> [ R$" . number_format($property->rental_price, 2, ',', '.') . "] </td>
                 <td> [ R$" . number_format($property->sale_price, 2, ',', '.') . "]</td>
                 <td> <a href='{$linkReadMode}'> Ver mais</a> | <a href='{$linkEditItem}'>Editar</a> | <a href='{$linkRemoveItem}'>Remover</a></td>
            </tr>";
        
    }

    echo "</table>";
}

?>
</div>
@endsection