    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Sadmin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="<?php if($current_page=='dashboard'){echo 'active';} ?>">
          <a href="?hal=dashboard">
            <i class = "fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($current_page=='form'){echo 'active';} ?>">
          <a href="?hal=form">
            <i class="fa fa-user"></i><span>Data Event</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> 
        <li class="<?php if($current_page=='nilai'){echo 'active';} ?>">
          <a href="?hal=nilai">
            <i class="fa  fa-gg"></i><span>Kategori</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
          </a>
        </li> 
      </ul>
    </section>