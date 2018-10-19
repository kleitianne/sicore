<div class="wrapper" >

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>professor/home" class="logo" style="background-color: #1a2226;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"> <img style="width: auto; height: 1em;" src="<?=base_url()?>assets/dist/img/icon.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SICORE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #1a2226;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle hover" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">            
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-user"></i>
              <span class="hidden-xs" class="usuario-nome_usual" name="nome"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header usuario-foto"  style="background-color: #343a40;">
                

                <p class="usuario-nome_usual">
                  
                  <small id="usuario-tipo_vinculo" name="vinculo"></small>
                </p>
              </li>
              <!-- Menu Body
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                /.row 
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <?php {?>
                    <a href="<?=base_url();?>usuario/sair" id="botao-sair" class="btn btn-default btn-flat">Sair</a>
                  <?php } ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color: #343a40;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image usuario-foto">
          
        </div>
        <div class="pull-left info">
          <p class="usuario-nome_usual"></p>
          <p id="usuario-matricula" name="matricula"></p>
        </div>
      </div>
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <!-- <li>
        <a href="<?=base_url()?>professor/visualizarNota">
         <i><img src="<?=base_url()?>assets/img/d.png" style="margin-right: 10px;"></i><span>Visualizar nota</span>
         
       </a>
     </li>
     <li>
      <a href="<?=base_url()?>aluno/ranking">
        <i><img src="<?=base_url()?>assets/img/b.png" style="margin-right: 10px;"></i><span>Visualizar ranking</span>
        
      </a>
    </li> -->
    <li class="header">Menu</li>
    <li>
      <a href="<?=base_url()?>professor/home">
        <i><img src="<?=base_url()?>assets/img/c.png" style="margin-right: 10px;"></i><span>Home Professor</span>
        
      </a>
    </li>
    <li>
      <a href="<?=base_url()?>professor/criarEvento">
        <i><img src="<?=base_url()?>assets/img/e.png" style="margin-right: 10px;"></i><span>Criar evento</span>
        
      </a>
    </li>
    <li>
      <a href="<?=base_url()?>professor/eventosArquivados">
        <i><img src="<?=base_url()?>assets/img/f.png" style="margin-right: 10px;"></i><span>Eventos arquivados</span>
        
      </a>
    </li>
  </ul>
    </section>
    <!-- /.sidebar -->
  </aside>