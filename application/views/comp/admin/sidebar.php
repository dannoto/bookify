    <nav class="sidebar sidebar-offcanvas"  style="background-color: #00b467 !important;" id="sidebar">
          <ul class="nav" style="background-color: #00b467 !important;">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link" style="background-color: #00b467 !important;">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?=base_url()?>assets/img/avatar/<?=$this->session->userdata('session_admin')['user_image']?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$this->session->userdata('session_admin')['user_name']?> <?=$this->session->userdata('session_admin')['user_surname']?></p>
                  <p class="designation">Administrador</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category"> Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Audiobooks</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/ebooks_publicar">Publicar Audiobook</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/ebooks_lista">Lista de Audiobooks</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/ebooks_categorias">Categorias</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/ebooks_features">Destaques</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                  </li> -->
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel/usuarios">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Usu??rios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel/suporte">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Suporte</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel/faq">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">FAQ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel/planos">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Planos</span>
              </a>
            </li>
            <li class="nav-item" style="background-color: #00b467 !important;" >
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Configura????es</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/configuracoes_gateways"> Gateway de Pagamento </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/configuracoes_marketing"> Email Marketing </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>painel/configuracoes_manutencao"> Manuten????o </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                  </li> -->
                </ul>
              </div>
            </li>
          </ul>
        </nav>