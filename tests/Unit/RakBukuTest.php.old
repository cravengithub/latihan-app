<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\RakBuku;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RakBukuTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create(): void
    {
        $rak_buku = [
            'nama' => 'Contoh Rak',
            'lokasi' => 'C01',
            'keterangan' => 'Ini Contoh Rak Buku',
        ];

        $response = $this->post('/rak_buku/store', $data);

        $response->assertStatus(201);

        $this->assertContains($response, $rak_buku);
    }

    public function test_show():void
    {
        $rak_buku = RakBuku::factory()->create();

        $response = $this->get('/rak_buku/show/' . $rak_buku->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'nama' => $rak_buku->nama,
                     'lokasi' => $rak_buku->lokasi,
                     'keterangan' => $rak_buku->keterangan,
                 ]);
    }

    public function test_update():void
    {
        $rak_buku = RakBuku::factory()->create();

        $data = [
            'nama' => 'RakBuku Baru',
            'lokasi' => 'CB01',
            'keterangan' => 'rak_buku telah diubah.',
        ];

        $response = $this->put('/rak_buku/' . $rak_buku->id.'/edit', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('rak_buku', $data);
    }

    public function test_delete():void
    {
        $rak_buku = RakBuku::factory()->create();

        $response = $this->delete('/rak_bukus/' . $rak_buku->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('rak_bukus', ['id' => $rak_buku->id]);
    }
}
