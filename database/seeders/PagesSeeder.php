<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page1 = new Page();
        $page2 = new Page();
        $page3 = new Page();
        $page4 = new Page();
        $page5 = new Page();
        // заполняем главную страницу
        $page1->title = 'jessica bennet';
        $page1->intro = 'photographer, new york';
        $page1->button_text = 'view all gallery';
        $page1->url = '/';
        $page1->name = 'home';
        $page1->type = 'main';
        // заполняем страницу "О нас"
        $page2->title = 'jessica bennet';
        $page2->img = 'no-img';
        $page2->text = '<div class="about__text"><p>I strive for making high quality photos available to everyone from designers and CG artists to average viewers. I truly believe that great works of photography are based on certain skills and techniques. There are a lot of factors that make an ordinary photo an outstanding one. But nowadays even ordinary photos are not available for wide usage without paying a certain fee.</p><div><p>Awards:</p></div><div class=""><ul class=""><li>2015 – MAGNUM 30 under 30, Winner</li><li>2014 – The Other Hundred, 1st Prize</li><li>2014 – American Photography 30, Selected Winner</li><li>2013 – Leica Oskar Barnack Award, Winner Newcomer</li><li>2012 – PDN Photo Annual - Student Work, Winner</li><li>2012 – AOP Student Awards, Finalist</li></ul></div><p>However, there are some photographers and artists, both enthusiastic and professional, who believe that creativity should not be restricted by money or law. I am one of them, and I am glad to offer you my photos and a lot of other works of my portfolio without any charge. It means you can always get my latest photos taken all around the world without paying a cent.</p><p>My work has appeared in printed and online magazines – National Geographic Magazine, The New York Times, GEO Germany, GEO France, Bloomberg Businessweek, Neu Zurcher Zeitung, Leica Fotografie International, Leica M Magazine, NEON, Marie Claire Italy, FOTO8, Reader’s Digest, National Geographic Traveler.</p></div>';
        $page2->url = '/about';
        $page2->name = 'About Me';
        $page2->type = 'about';
        // заполняем страницу "Портфолио"
        $page3->title = 'jessica bennet';
        $page3->url = '/portfolio';
        $page3->name = 'Portfolio';
        $page3->type = 'portfolio';
        // заполняем страницу "Сервисы"
        $page4->title = 'jessica bennet';
        $page4->name = 'Services';
        $page4->type = 'services';
        $page4->url = '/services';
        $page4->text = 'As a professional photographer, I offer my clients a wide set of services they can use for the benefit of their business or to make their project look more attractive. Even if you are not a businessman, you can still find what you are looking for at my website. Feel free to browse this page to learn more about photography services I provide.';
        // заполняем страницу "Контакты"
        $page5->title = 'jessica bennet';
        $page5->name = 'Contact Me';
        $page5->type = 'сontact';
        $page5->url = '/сontact';
        $page5->text = 'You can contact me any way that is convenient for you. I am available 24/7 via fax, email or telephone. You can also use a quick contact form located on this page to ask a question about my services and projects I work on. I would be happy to answer your questions or offer any help. ';
        $page1->save();
        $page2->save();
        $page3->save();
        $page4->save();
        $page5->save();
    }
}
