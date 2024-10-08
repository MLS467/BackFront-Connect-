<?php

namespace sistema;

use PDOException;
use sistema\Crud;


class Triagem extends Crud
{
    private ?int $id;
    private ?int $id_enfermeiro;
    private ?string $sintomas;
    private ?string $gravidade;
    private ?string $tempo_inicio;
    private ?string $localizacao_dor;
    private ?string $pressao_arterial;
    private ?string $frequencia_cardiaca;
    private ?string $temperatura;
    private ?string $saturacao;
    private ?string $frequencia_respiratoria;
    private ?string $intensidade_da_dor;
    private ?string $observacoes;
    private ?string $natureza_dor;
    private ?string $medicamento_uso;

    public function __construct(?array $dados)
    {
        $this->nomeTabela = 'triagem';
        $this->id_enfermeiro = $dados['id_enfermeiro'];
        $this->sintomas = $dados['sintomas'] ?? null;
        $this->gravidade = $dados['gravidade'] ?? null;
        $this->tempo_inicio = $dados['tempo_inicio'] ?? null;
        $this->localizacao_dor = $dados['localizacao_dor'] ?? null;
        $this->pressao_arterial = $dados['pressao_arterial'] ?? null;
        $this->frequencia_cardiaca = $dados['frequencia_cardiaca'] ?? null;
        $this->temperatura = $dados['temperatura'] ?? null;
        $this->saturacao = $dados['saturacao'] ?? null;
        $this->frequencia_respiratoria = $dados['frequencia_respiratoria'] ?? null;
        $this->intensidade_da_dor = $dados['intensidade_dor'] ?? null;
        $this->observacoes = $dados['observacoes'] ?? null;
        $this->natureza_dor = $dados['natureza_dor'] ?? null;
        $this->medicamento_uso = $dados['medicamento_uso'] ?? null;
    }


    public function inserirDados()
    {
        try {
            $sql = "INSERT INTO $this->nomeTabela VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = Db::preparar($sql);
            $result = $stmt->execute(array(
                $this->getIdEnfermeiro(),
                $this->getSintomas(),
                $this->getGravidade(),
                $this->getTempoInicio(),
                $this->getLocalizacaoDor(),
                $this->getPressaoArterial(),
                $this->getFrequenciaCardiaca(),
                $this->getTemperatura(),
                $this->getSaturacao(),
                $this->getFrequenciaRespiratoria(),
                $this->getIntensidadeDaDor(),
                $this->getObservacoes(),
                $this->getNaturezaDor(),
                $this->getMedicamentoUso()
            ));

            if ($result) {
                $this->setId(Db::conectar()->lastInsertId());
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                return 'Erro na execução da query: ' . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }



    public function atualizarDados($id) {}


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter e Setter para id_enfermeiro
    public function getIdEnfermeiro(): ?int
    {
        return $this->id_enfermeiro;
    }

    public function setIdEnfermeiro(?int $id_enfermeiro): void
    {
        $this->id_enfermeiro = $id_enfermeiro;
    }

    // Getter e Setter para sintomas
    public function getSintomas(): ?string
    {
        return $this->sintomas;
    }

    public function setSintomas(?string $sintomas): void
    {
        $this->sintomas = $sintomas;
    }

    // Getter e Setter para gravidade
    public function getGravidade(): ?string
    {
        return $this->gravidade;
    }

    public function setGravidade(?string $gravidade): void
    {
        $this->gravidade = $gravidade;
    }

    // Getter e Setter para tempo_inicio
    public function getTempoInicio(): ?string
    {
        return $this->tempo_inicio;
    }

    public function setTempoInicio(?string $tempo_inicio): void
    {
        $this->tempo_inicio = $tempo_inicio;
    }

    // Getter e Setter para localizacao_dor
    public function getLocalizacaoDor(): ?string
    {
        return $this->localizacao_dor;
    }

    public function setLocalizacaoDor(?string $localizacao_dor): void
    {
        $this->localizacao_dor = $localizacao_dor;
    }

    // Getter e Setter para pressao_arterial
    public function getPressaoArterial(): ?string
    {
        return $this->pressao_arterial;
    }

    public function setPressaoArterial(?string $pressao_arterial): void
    {
        $this->pressao_arterial = $pressao_arterial;
    }

    // Getter e Setter para frequencia_cardiaca
    public function getFrequenciaCardiaca(): ?string
    {
        return $this->frequencia_cardiaca;
    }

    public function setFrequenciaCardiaca(?string $frequencia_cardiaca): void
    {
        $this->frequencia_cardiaca = $frequencia_cardiaca;
    }

    // Getter e Setter para temperatura
    public function getTemperatura(): ?string
    {
        return $this->temperatura;
    }

    public function setTemperatura(?string $temperatura): void
    {
        $this->temperatura = $temperatura;
    }

    // Getter e Setter para saturacao
    public function getSaturacao(): ?string
    {
        return $this->saturacao;
    }

    public function setSaturacao(?string $saturacao): void
    {
        $this->saturacao = $saturacao;
    }

    // Getter e Setter para frequencia_respiratoria
    public function getFrequenciaRespiratoria(): ?string
    {
        return $this->frequencia_respiratoria;
    }

    public function setFrequenciaRespiratoria(?string $frequencia_respiratoria): void
    {
        $this->frequencia_respiratoria = $frequencia_respiratoria;
    }

    // Getter e Setter para intensidade_da_dor
    public function getIntensidadeDaDor(): ?string
    {
        return $this->intensidade_da_dor;
    }

    public function setIntensidadeDaDor(?string $intensidade_da_dor): void
    {
        $this->intensidade_da_dor = $intensidade_da_dor;
    }

    // Getter e Setter para observacoes
    public function getObservacoes(): ?string
    {
        return $this->observacoes;
    }

    public function setObservacoes(?string $observacoes): void
    {
        $this->observacoes = $observacoes;
    }

    // Getter e Setter para natureza_dor
    public function getNaturezaDor(): ?string
    {
        return $this->natureza_dor;
    }

    public function setNaturezaDor(?string $natureza_dor): void
    {
        $this->natureza_dor = $natureza_dor;
    }

    public function getMedicamentoUso(): string
    {
        return $this->medicamento_uso;
    }

    public function setMedicamentoUso(string $medicamento_uso): void
    {
        $this->medicamento_uso = $medicamento_uso;
    }
}