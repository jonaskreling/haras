<script type="text/ng-template" id="componente-menu-sistema.html">
	<div class="row" style="margin:50px 0px 20px 0px">
		<div class="col-xs-3">
			<h3>
				<i class="glyphicon glyphicon-briefcase"></i>
				Ferramentas
			</h3>
		</div>
		<div class="col-xs-9">
			<h3>
				<i ng-class="menuPage.icon"></i>
				{{menuPage.title}}
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3" style="min-height:700px">
			<ul class="nav nav-stacked">
				<li ng-click='abrirMenu($index)' ng-repeat="page in pagesMenu" ng-show="page.show">
					<a href="javascript:;">
					    <i ng-class="page.icon"></i>
					    &nbsp;&nbsp;{{page.title}}
                    </a>
				</li>
			</ul>
		</div>
		<div class="col-xs-9" ng-include src='menuPage.link'></div>
	</div>
</script>