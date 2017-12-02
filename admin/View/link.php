 <div id="link">
    <div class="menu">
        <div class="lanmu">管理员</div>
        <ul class="ul">
            <li><a href=./addAdmin.php>添加管理员</a></li>
            <li><a href='./editAdmin.php'>管理管理员</a></li>       
        </ul>
    </div>
    <div class="menu">
        <div class="lanmu">商品分类</div>
        <ul class="ul">
             <li><a href='./editCategory.php'>管理分类</a></li>       
        </ul>
    </div>
    <div class="menu">
        <div class="lanmu">参数</div>
        <ul class="ul">
            <li><a href=./addParameter.php>添加商品参数</a></li>
             <li><a href='./editParameter.php'>管理商品参数</a></li>       
        </ul>
    </div>
    <div class="menu">
        <div class="lanmu">商品</div>
        <ul class="ul">
            <li><a href=./addGoods.php>添加商品</a></li>
             <li><a href='./editGoods.php'>管理商品</a></li>       
        </ul>
    </div>
    <div class="menu">
        <div class="lanmu">SKU</div>
        <ul class="ul">
            <li><a href=./addSku.php>添加SKU</a></li>
             <li><a href='./editSku.php'>管理SKU</a></li>      
        </ul>
    </div>
    <div class="menu">
         <div class="lanmu">销售订单</div>
        <ul class="ul">
            <li><a href=./editOrder.php>订单统计</a></li><!-- //全部订单、单个订单查询、待发货、退货、已发货、结清 -->     
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(".menu").hover(function(){$(this).find("ul").slideDown(100)},function(){$(this).find("ul").slideUp(100);});
</script>
    



