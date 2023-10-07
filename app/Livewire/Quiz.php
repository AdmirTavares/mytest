<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Save;

class Quiz extends Component
{
    public $questions = [];
    public $selectedResponse = null;
    public $selectedOptions = [];
    public $selectedCard = [];
    public $TextFildeVisibilite = false;
    public $smartWizardCheck="smartWizardCheck";

    public function RadioSave($number, $question, $option)
    {
        $aux = Save::where('number', $number)->get();
        if ($aux->isEmpty() || $aux == NULL) {
            Save::create([
                'number' => $number,
                'question' => $question,
                'answer' => $option,
            ]);
        } else {
            Save::where('number', $number)->update([
                'answer' => $option,
            ]);
        }
    }

    public function answerTextfield()
    {
        
        $this->TextFildeVisibilite=true;
    }







    public function validateSelection($questionNumber, $option)
    {
        // Verifique se a opção foi selecionada e, se sim, adicione-a ao array de seleções.
        if (isset($this->selectedOptions[$questionNumber][$option])) {
            $this->selectedOptions[$questionNumber]['selected'] = true;
        } else {
            $this->selectedOptions[$questionNumber]['selected'] = false;
        }

        // Verifique se pelo menos uma opção foi selecionada em todas as perguntas.
        foreach ($this->questionData as $question) {
            if (!isset($this->selectedOptions[$question['number']]['selected']) || !$this->selectedOptions[$question['number']]['selected']) {
                $this->addError('selectedOptions', 'Selecione pelo menos uma opção em cada pergunta.');
                return;
            }
        }
    }

    protected function loadQuestionsFromJson()
    {
        $jsonPath = resource_path('json/quiz.json');
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $data = json_decode($jsonContent, true);
            if (isset($data['questions'])) {
                $this->questions = $data['questions'];
            }
        }
    }


    public function render()
    {
        $this->smartWizardCheck="smartWizardCheck";
        $questions =  $this->loadQuestionsFromJson();
        return view('livewire.quiz', compact('questions'));
    }
}
