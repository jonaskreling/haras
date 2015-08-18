<?php
    /**
     * TAB GERAL
     */
?>
<div role="tabpanel" class="tab-pane active" id="tabgeral" ng-show="user == 3">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <form>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" ng-model="carregarDadosDoSite"> Dados site.
                    </label>
                </div>
                <button type="button" class="btn btn-primary" ng-click="salvarGeral()">Salvar</button>
            </form>			
        </div>
    </div>
</div>