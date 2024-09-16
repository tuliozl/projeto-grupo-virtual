<div>
<?
        foreach($customers as $customer){   ?>
        <div style="margin-bottom: 15px;">
            <p>ID: <?=$customer["id"]?></p>
            <p>NOME: <?=$customer["name"]?></p>
            <p>E-MAIL: <?=$customer["email"]?></p>
        </div>
    <? }?>
</div>