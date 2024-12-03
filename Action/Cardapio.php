<?php

namespace connect;

class Cardapio {
    private $id;
    private $foto;
    private $nome;
    private $descricao;
    private $tipo;
    private $valor;

    // Getter e Setter para 'id'
    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    // Getter e Setter para 'foto'
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto(string $foto) {
        $this->foto = $foto;
    }

    // Getter e Setter para 'nome'
    public function getNome() {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    // Getter e Setter para 'descricao'
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
    }

    // Getter e Setter para 'tipo'
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo(string $tipo) {
        $this->tipo = $tipo;
    }

    // Getter e Setter para 'valor'
    public function getValor() {
        return $this->valor;
    }

    public function setValor(float $valor) {
        $this->valor = $valor;
    }
}
