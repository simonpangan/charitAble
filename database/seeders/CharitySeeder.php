<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Benefactor;
use App\Enums\CharityCategory;
use App\Models\Categories;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Charity\CharityCategories;
use App\Models\Charity\CharityFollowers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Categories::all()->pluck('id');

        if (Charity::count() < 30) 
        {
            $users = User::factory()
                ->count(30)
                ->charitySuperAdmin()
                ->create();

            $users->each(function ($user, $key) use (&$userFollowing, $categories) {
                $charity = Charity::factory()
                    ->logo("http://i.cdn.turner.com/nba/nba/.element/img/1.0/teamsites/logos/teamlogos_500x500/" 
                        . $this->nbaTeamsLogos()[$key] . ".png")
                    ->ethAddress($this->ethAddress()[$key])
                    ->create(
                        [
                            'id' => $user->id,
                            'name' => $this->charities()[$key],
                        ]
                    );

        // attach 3 categories per fake charity
                $charity->categories()->attach(
                    $categories->random(4)
                );
            });
        }
    }

    private function nbaTeamsLogos() 
    {
        return [
            "atl", "bkn", "bos", "cha", "chi", "cle", "dal", "den",
            "det", "gsw", "hou", "ind", "lac", "lal", "mem", "mia", 
            "mil", "min", "nop", "nyk", "okc", "orl", "phi", "phx", 
            "por", "sac", "sas", "tor", "uta", "was",
        ];
    }

    private function charities() 
    {
        return [
            'ABS-CBN FOUNDATION INCORPORATED', 
            'A HOME FOR THE ANGELS CHILD CARING FOUNDATION, INC.', 
            'ASILO DE SAN VICENTE DE PAUL', 
            'ASOCIACION DE DAMAS DE FILIPINAS INC', 
            'ATING FAMILIA FOUNDATION, INC.', 
            'BAHAY TULUYAN, INC.', 
            'CASA MIANI SOMASCON FATHERS FDN, INC.', 
            'CASA MIANI SAN JOSE', 
            'CHILDREN\'S JOY FOUNDATION, INC.', 
            'CHOSEN CHILDREN, INCORPORATED', 
            'CHRISTIAN GROWTH MINISTRIES', 
            'FRIENDSHIP HOME OF FATHER LUIS AMIGO, INCORPORATED', 
            'GUANELLA CENTER, INC.', 
            'LAURA VICUÑA FOUNDATION INC.', 
            'LETO CHRISTIAN CENTER INCORPORATED', 
            'MERITXELL CHILDREN\'S WORLD FOUNDATION, INC. ', 
            'SUN AND MOON FOUNDATION, INC.', 
            'TAHANAN MAPAGKALINGA NI MADRE RITA, INC.', 
            'INTERNATIONAL NEEDS, INC.', 
            'BAHAY SILUNGAN SA DAUNGAN', 
            'KATIPUNAN NG MAY KAPANSANAN SA PILIPINAS, INC. ', 
            'VINCENTIAN MISSIONARIES SOCIAL DEVELOPMENT FOUNDATION, INC', 
            'PHILIPPINE CHILDREN\'S FUND OF AMERICA', 
            'NATIONAL COUNCIL OF CHURCHES IN THE PHILIPPINES, INC.', 
            'NATIONAL COUNCIL OF SOCIAL DEVELOPMENT FOUNDATION OF THE PHILIPPINES, INC.', 
            'LOUISE DE MARILLAC FOUNDATION, INC. ', 
            'HEALTH ALL DEVELOPMENT INTERNATIONAL (HADI) FOUNDATION, INC.', 
            'FOUNDATION OF OUR LADY OF PEACE MISSION ', 
            'CITIZENS\' DISASTER RESPONSE CENTER', 
            'CHARITY FIRST FOUNDATION, INC.', 
            'BAHAY SILUNGAN SA PALIPARAN', 
        ];
    }

    private function ethAddress() 
    {
        return [
            "0xce9e213Ce0D408889CAf7a5C0fCac7b152A5fBb3", 
            "0x8C311d6B0851642Af706613AeF8c032adfC87FEf", 
            "0x5D4b9e91327314C79E1F16A7e5D1ACA09B48A8Ff", 
            "0x3dcAe8BCe3D4cA97279D9A6bd114f9CE3CF1fC33", 
            "0xA8953b3B2E28135294B8F6B2F9bBe7B5A6376439", 
            "0xf85FbDe8Fb5867A868F8FC4dBd7d66c93Aab12f3", 
            "0x6F1CF8607DD80622C726D0aeDcF2622dA8Fb6Ecf", 
            "0xb36396D6FE49DB8db9691C4eDBD9B9dF9E91Ba02",
            "0x377aCe4C652E52908142d5cA597275C2e87d4268", 
            "0x954643776E91CA007Bf67A1F870FeAe0df4caff9", 
            "0x776E6D7550ac3A88Db977e4F3B634CB4fB0E82A1", 
            "0x249d26a231A18E95F8Fe9AdBB46d08e9f82d280E", 
            "0x529067eAAa7C66Db4505CaF7c90A015Def5C658A", 
            "0x6B663ca9FFD867dCb353C47ddeb5D07D3F368d60", 
            "0xF5Acf087Eee2FD30ddd7182Ee165da856FEe4602", 
            "0x0099AdF001aCd405e6B9173754bF50C9A5e3D97C", 
            "0xC4D48E6AD64350637Fb01B69C6f86DC1D9A6957D", 
            "0xb87ffc69b274F4fE6dB029F98fd227e59B4F547C", 
            "0xd4613a5b8CbC605b6f384B141aB79B0C00491d20", 
            "0x250C0255f623396c899C7f9fBBF2CcefC75C3543", 
            "0x57d50581B79Bc8D1094652aF123Ad972e958B826", 
            "0xDFD3C08cEa2D6aF89b69ADaae0D7aA4b31b2B1f3", 
            "0xef6c16F40d27dCc981DEa20205a29d55aA720d7c", 
            "0xFEC833907b0CBa7f4CF553f8229b8d04AD2fa16B", 
            "0x5833AA6F69955cDc5958696A91BCE62F925D6fBd", 
            "0xA5AeA77bcaB9235D67c75f70d3a7Ca1f91F77652", 
            "0x81b349E845D014793b7d2ed52ba162f5A489eCCC", 
            "0xcC9bCB2ad339669166bafbf38dE775E38f3632A6", 
            "0xE6D2793228c012E4d5d3BEd003e731cD32cF6C55", 
            "0xAA8cBfBAb93659D40208d4Ac0fb47960b073C652",
        ];
    }
}