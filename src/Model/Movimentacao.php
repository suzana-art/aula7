<?php

namespace App\Model;

class Movimentacao
{
    private ?int $id;
    private int $pessoaId;
    private string $tipo;
    private ?string $descricao;

    public function __construct(
        int $pessoaId,
        string $tipo,
        ?string $descricao
    ) {
        $this->pessoaId = $pessoaId;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPessoaId(): int
    {
        return $this->pessoaId;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }
}