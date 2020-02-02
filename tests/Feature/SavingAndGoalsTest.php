<?php

namespace Tests\Feature;

use App\Models\Goal\Goal;
use App\Models\Saving\Saving;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SavingAndGoalsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function totalSavingsWithGoals()
    {
        $saving = factory(Saving::class)->create([
            'amount' => 2000
        ]);

        $viaggi = factory(Goal::class)->create([
            'name' => 'Viaggi',
            'percentage' => 30,
            'saving_id' => $saving->id
        ]);

       $macchina = factory(Goal::class)->create([
            'name' => 'Macchina',
            'percentage' => 10,
            'saving_id' => $saving->id
        ]);

        $this->assertTrue($saving->getTotal() === 2000);
        $this->assertTrue($saving->getRealSaving() === 1200.0);
        $this->assertTrue($saving->getGoals() === 800.0);
        $this->assertTrue($macchina->getGoalSaving() === 200.0);
    }
}
