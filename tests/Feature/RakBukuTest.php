<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\RakBuku;
use Tests\TestCase;

class RakBukuTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /**
     * A basic unit test example.
     */
    public function test_create(): void
    {
        $rak_buku = [
            'nama' => 'Pemrograman',
            'lokasi' => 'P01',
            'keterangan' => 'Kosong',
        ];

        $response = $this->post('/rak_buku/store', $rak_buku);

        $response->assertStatus(405);

        $this->assertDatabaseHas('rak_buku', $rak_buku);
    }

    public function test_show(): void
    {
        $rak_buku = new RakBuku();

        $response = $this->get('/rak_buku/show/' . $rak_buku->id);

        $response->assertStatus(404)
            ->assertJson([
                'nama' => $rak_buku->nama,
                'lokasi' => $rak_buku->lokasi,
                'keterangan' => $rak_buku->keterangan,
            ]);
    }

    public function test_update(): void
    {
        $rak_buku = RakBuku::find(1);

        $data = [
            'nama' => 'Pemrograman',
            'lokasi' => 'P01',
            'keterangan' => 'Kosong',
        ];

        $response = $this->put('/rak_buku/' . $rak_buku->id . '/edit', $data);

        $response->assertStatus(405);

        $this->assertDatabaseHas('rak_buku', $data);
    }

    public function test_delete(): void
    {
        $rak_buku = RakBuku::factory()->create();

        $response = $this->delete('/rak_bukus/' . $rak_buku->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('rak_bukus', ['id' => $rak_buku->id]);
    }
}
