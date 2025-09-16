<main class="d-flex flex-nowrap h-100" >
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-azulM" style="width: 100%">
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    <span class="fs-6 text-light">Sistema</span>
                </button>

                <div class="collapse" id="home-collapse">
                    <ul class="list-unstyled fw-normal py-2 small">
                        <!-- Colocar os links para os Tipos de Bolsa Atleta ou Parcial -->
                        <li><a href="#" class="btn-menu ml-4 px-4 mb-2">Integral</a></li>
                        <li><a href="#" class="btn-menu ml-4 px-4 mb-2">Parcial</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded border-0 collapsed text-white" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    <span class="fs-6 text-light">Cronograma</span>
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="list-unstyled fw-normal py-2 small">
                        <li><?= $this->Html->link('Cadastrar', ['controller' => 'Eventos', 'action' => 'add'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                        <li><?= $this->Html->link('Listar', ['controller' => 'Eventos', 'action' => 'index'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded border-0 collapsed text-white" data-bs-toggle="collapse" data-bs-target="#candidato-collapse" aria-expanded="false">
                    <span class="fs-6 text-light">Candidato</span>
                </button>
                <div class="collapse" id="candidato-collapse">
                    <ul class="list-unstyled fw-normal py-2 small">
                        <li><?= $this->Html->link('Listar', ['controller' => 'Candidatos', 'action' => 'index'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded border-0 collapsed text-white" data-bs-toggle="collapse" data-bs-target="#escola-collapse" aria-expanded="false">
                    <span class="fs-6 text-light">Escolas</span>
                </button>
                <div class="collapse" id="escola-collapse">
                    <ul class="list-unstyled fw-normal py-2 small">
                        <li><?php $this->Html->link('Cadastrar', ['controller' => 'Escolas', 'action' => 'add'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                        <li><?php $this->Html->link('Listar', ['controller' => 'Escolas', 'action' => 'index'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded border-0 collapsed text-white" data-bs-toggle="collapse" data-bs-target="#responsavel-collapse" aria-expanded="false">
                    <span class="fs-6 text-light">Responsável</span>
                </button>
                <div class="collapse" id="responsavel-collapse">
                    <ul class="list-unstyled fw-normal py-2 small">
                        <li><?php $this->Html->link('Cadastrar', ['controller' => 'Responsavels', 'action' => 'add'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                        <li><?= $this->Html->link('Listar', ['controller' => 'Responsavels', 'action' => 'index'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>

                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded border-0 collapsed text-white" data-bs-toggle="collapse" data-bs-target="#usuario-collapse" aria-expanded="false">
                    <span class="fs-6 text-light">Usuários</span>
                </button>
                <div class="collapse" id="usuario-collapse">
                    <ul class="list-unstyled fw-normal py-2 small">
                        <li><?= $this->Html->link('Cadastrar', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                        <li><?= $this->Html->link('Listar', ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn-menu ml-4 px-4', 'escape' => false]) ?></li>
                    </ul>
                </div>
            </li>


        </ul>


    </div>

</main>