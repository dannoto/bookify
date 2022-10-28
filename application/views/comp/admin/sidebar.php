    <nav class="sidebar sidebar-offcanvas" style="background-color: orange !important;" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?=base_url()?>assets_admin/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Allen Moreno</p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
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
                <span class="menu-title">Usuários</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel/suporte">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Suporte</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>painel/planos">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Planos</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/font-awesome.html">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Configurações</span>
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
                    <a class="nav-link" href="<?=base_url()?>painel/configuracoes_manutencao"> Manutenção </a>
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