<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        $categories = ['contract', 'petition', 'ruling', 'evidence', 'correspondence', 'other'];
        $mimeTypes = [
            'contract' => 'application/pdf',
            'petition' => 'application/pdf',
            'ruling' => 'application/pdf',
            'evidence' => 'image/jpeg',
            'correspondence' => 'application/pdf',
            'other' => 'application/pdf',
        ];
        $titles = [
            'contract' => ['Contrato de Prestação de Serviços', 'Contrato Social', 'Aditivo Contratual'],
            'petition' => ['Petição Inicial', 'Contestação', 'Réplica', 'Recurso de Apelação'],
            'ruling' => ['Sentença', 'Decisão Interlocutória', 'Acórdão', 'Despacho'],
            'evidence' => ['Prova Documental', 'Laudo Pericial', 'Captura de Tela', 'Foto'],
            'correspondence' => ['Ofício', 'Carta', 'Notificação', 'Intimação'],
            'other' => ['Documento Diverso', 'Anotação', 'Parecer Interno'],
        ];

        $category = $this->faker->randomElement($categories);

        return [
            'process_id' => Process::factory(),
            'uploaded_by' => User::factory(),
            'title' => $this->faker->randomElement($titles[$category]),
            'description' => $this->faker->optional(0.6)->sentence(6),
            'file_path' => 'documents/' . date('Y') . '/' . date('m') . '/' . $this->faker->uuid . '.pdf',
            'original_name' => $this->faker->unique()->word() . '.pdf',
            'mime_type' => $mimeTypes[$category] ?? 'application/pdf',
            'file_size' => $this->faker->numberBetween(10240, 10485760), // 10KB to 10MB
            'category' => $category,
            'notes' => $this->faker->optional(0.3)->sentence(4),
        ];
    }

    public function contract(): static
    {
        return $this->state(fn () => ['category' => 'contract']);
    }

    public function petition(): static
    {
        return $this->state(fn () => ['category' => 'petition']);
    }

    public function ruling(): static
    {
        return $this->state(fn () => ['category' => 'ruling']);
    }
}
