<?php

namespace App\Model;

class Pessoa
{
    private ?int $id = null;

    private string $nome;

    private ?string $telefone;

    private string $cpf;

    private ?string $endereco;


    public function __construct(
        string $nome,
        ?string $telefone,
        string $cpf,
        ?string $endereco
    ) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
    }


    // ==========================================
    // ID
    // ==========================================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    // ==========================================
    // NOME
    // ==========================================

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }


    // ==========================================
    // TELEFONE
    // ==========================================

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }


    // ==========================================
    // CPF
    // ==========================================

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }


    // ==========================================
    // ENDEREÇO
    // ==========================================

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): void
    {
        $this->endereco = $endereco;
    }
}