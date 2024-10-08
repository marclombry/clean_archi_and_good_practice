<?php 

namespace Src\Domain\Repository;

interface RepositoryInterface
{
    public function getRepository(string $repositoryClass): static;
}