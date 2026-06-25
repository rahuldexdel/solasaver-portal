<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Models\Page;
use Modules\Cms\Models\SiteSetting;

class CmsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCompatibility();
        $this->seedHome();
        $this->seedWhyChooseUs();
        $this->seedWhereToBuy();
        $this->seedFindElectrician();
        $this->seedSettings();
    }

    /**
     * Create/refresh a section and its items. Safe to re-run.
     */
    private function section(Page $page, string $key, string $name, array $attrs, array $items = [], int $order = 0): void
    {
        $section = $page->sections()->updateOrCreate(
            ['section_key' => $key],
            array_merge($attrs, ['name' => $name, 'sort_order' => $order])
        );

        $section->items()->delete();
        foreach (array_values($items) as $i => $item) {
            $section->items()->create(array_merge($item, ['sort_order' => $i + 1]));
        }
    }

    private function seedHome(): void
    {
        $home = Page::updateOrCreate(['slug' => 'home'], [
            'title'      => 'Home',
            'meta_title' => 'SolaSaver — Smarter Solar, Smarter Savings',
            'is_active'  => true,
        ]);

        $this->section($home, 'hero', 'Hero Banner', [
            'heading'      => 'Use More of Your Own Solar Power [[Simply and Affordably]]',
            'body'         => 'SolaSaver is a smart solar diverter that automatically uses excess solar energy within your home, helping reduce electricity bills and maximise the value of your solar system.',
            'button_text'  => 'How It Works',       'button_url'  => '#',
            'button_text2' => 'Check Compatibility', 'button_url2' => '#',
        ], [], 1);

        $this->section($home, 'icon_grid', 'Feature Icons', [], [
            ['icon' => 'img/Subscriptions-icon.svg', 'body' => 'No apps or subscriptions'],
            ['icon' => 'img/Set-forget-icon.svg',    'body' => 'Simple "set and forget"'],
            ['icon' => 'img/Solar-energy-icon.svg',  'body' => 'Works with existing solar systems'],
            ['icon' => 'img/Australia-map-icon.svg', 'body' => 'Designed in Australia'],
        ], 2);

        $this->section($home, 'how_it_works', 'How SolaSaver Works', [
            'heading' => 'How SolaSaver Works',
            'body'    => 'SolaSaver automatically detects excess solar energy and diverts it to your hot water system - simple, smart and effective. Instead of exporting surplus energy to the grid for low feed-in tariffs, SolaSaver helps you use more of your own solar power at home.',
            'image'   => 'img/order-solasaver.jpg',
        ], [
            ['icon' => 'img/solar-system-icon.svg',   'heading' => 'Your solar system produces excess power', 'body' => 'Solar energy powers your home during the day.'],
            ['icon' => 'img/searchsolar-icon.svg',    'heading' => 'SolaSaver detects unused solar energy',    'body' => 'It monitors your solar output in real time.'],
            ['icon' => 'img/battery-charge-icon.svg', 'heading' => 'Excess energy is redirected to your hot water system', 'body' => 'Heating your water with free solar energy.'],
        ], 3);

        $this->section($home, 'why_choose', 'Why Homeowners Choose', [
            'heading' => 'Why Homeowners Choose [[SolaSaver]]',
            'image'   => 'img/why-choose-us-img.jpg',
        ], [
            ['heading' => 'Reduce reliance on grid electricity', 'body' => 'Use more of the solar power you already generate.'],
            ['heading' => 'No expensive battery systems',        'body' => 'A simpler alternative for improving solar self-consumption.'],
            ['heading' => 'No apps or ongoing fees',             'body' => 'No subscriptions. No complicated setup.'],
            ['heading' => 'Designed for everyday households',     'body' => 'Simple operation designed for real Australian homes.'],
        ], 4);

        $this->section($home, 'suitable', 'Compatibility CTA', [
            'heading'     => 'Is Your Home Suitable for [[SolaSaver?]]',
            'subheading'  => 'Use our quick compatibility checker to see if SolaSaver is right for your solar system.',
            'body'        => 'This check provides a general indication only. Final compatibility and installation requirements must be confirmed by a licensed electrician.',
            'button_text' => 'Check Compatibility', 'button_url' => '#',
        ], [], 5);

        $this->section($home, 'australian_homes', 'Australian Homes', [
            'heading' => 'Designed for Australian Homes',
            'body'    => 'SolaSaver is an Australian-designed and engineered product, built to help households get more value from the solar power they already generate.',
            'image'   => 'img/Australian Homes.jpg',
        ], [
            ['icon' => 'img/solar-system-icon.svg', 'body' => 'Australian Designed'],
            ['icon' => 'img/quality-comp-ico.svg',  'body' => 'Quality Components'],
            ['icon' => 'img/guarantee-ico.svg',     'body' => '1 year warranty (12 months)'],
            ['icon' => 'img/location-ico.svg',      'body' => 'Local Support Available'],
        ], 6);
    }

    private function seedWhyChooseUs(): void
    {
        $page = Page::updateOrCreate(['slug' => 'why-choose-us'], [
            'title'      => 'Why Choose Us',
            'meta_title' => 'Why Choose SolaSaver?',
            'is_active'  => true,
        ]);

        $this->section($page, 'hero', 'Page Hero', [
            'heading' => 'Why Choose SolaSaver?',
            'body'    => 'A smarter, simpler way to use more of your own solar power without complexity, high costs, or ongoing maintenance.',
        ], [], 1);

        $this->section($page, 'how_works', 'How It Works', [
            'heading'      => 'How [[SolaSaver]] Works',
            'subheading'   => 'Use more of your own solar power - simply and affordably',
            'body'         => "Many homes export excess solar energy to the grid during the day and receive only a small credit. Later, when solar production drops, they buy electricity back from the grid at a much higher price.\n\nSolaSaver detects when your solar system is producing more electricity than your home is using and automatically redirects that excess energy to useful household loads such as hot water or other appliances instead of exporting it to the grid.\n\nIt's a simple, affordable way to make better use of the solar you already generate.",
            'image'        => 'img/hsw-right-img.jpg',
            'button_text'  => 'Will SolaSaver Work for My Home?', 'button_url'  => '#',
            'button_text2' => 'How Much Could I Save?',           'button_url2' => '#',
        ], [], 2);

        $this->section($page, 'use_more', 'Use More of Your Solar', [
            'heading' => 'Use More of Your Solar',
            'body'    => "Most solar homes produce more electricity during the day than they use. That excess power is exported to the grid for a small credit - and bought back later at a much higher price.\n\nSolaSaver automatically redirects excess solar to useful loads in your home so you can use more of your own energy.",
        ], [
            ['icon' => 'img/Set & Forget Operation.svg', 'heading' => 'Set & Forget Operation', 'body' => 'Once installed, SolaSaver automatically monitors your solar generation and household demand. There are no apps to manage and no complicated settings to configure.'],
            ['icon' => 'img/Easy to Use.svg', 'heading' => 'Easy to Use – No Apps, No Upgrades', 'body' => "Installed by a licensed electrician, SolaSaver simply runs in the background. No apps, no Wi-Fi and no complicated settings."],
            ['icon' => 'img/Compact Design.svg', 'heading' => 'Compact Design', 'body' => 'SolaSaver is no bigger than a standard circuit breaker. It clips neatly onto your main wire, taking up minimal space while delivering maximum savings.'],
            ['icon' => 'img/Pays for Itself Sooner.svg', 'heading' => 'Pays for Itself Sooner', 'body' => 'For the average household, SolaSaver is expected to pay for itself quickly. After that, every reduction in your electricity bill is money back in your pocket.', 'link_text' => 'How Much Can I Save', 'link_url' => '#'],
            ['icon' => 'img/Boost Button.svg', 'heading' => 'Boost Button for Extra Hot Water', 'body' => 'Run out after cloudy days or heavy use? Just press the Boost button to top up from the grid. Boost runs in 36 or 72 minute intervals.', 'link_text' => 'Boost Button Explainer', 'link_url' => '#'],
            ['icon' => 'img/Australian Designed.svg', 'heading' => '100% Australian Designed & Tested', 'body' => 'Designed in Australia, compliant with AS/NZS standards and backed by a 12-month warranty.'],
        ], 3);

        $this->section($page, 'find_out', 'Compatibility Blocks', [], [
            ['image' => 'img/Compatible left image.jpg', 'heading' => 'Compatible With Most Rooftop Solar Systems', 'body' => 'If your home has rooftop solar but no battery, SolaSaver will likely work for you. It connects to most existing solar systems and automatically redirects excess solar energy to useful loads such as hot water systems, pool pumps, underfloor heating and heat banks.'],
            ['image' => 'img/Fout Right Image.jpg', 'heading' => 'Find Out if SolaSaver Will Work in Your Home', 'body' => "Answer a few quick questions about your solar system and electrical loads. Quick home compatibility check. Takes about 2 minutes.", 'link_text' => 'Will SolaSaver Work for My Home?', 'link_url' => '#'],
        ], 4);
    }

    private function seedWhereToBuy(): void
    {
        $page = Page::updateOrCreate(['slug' => 'where-to-buy'], [
            'title'      => 'Where to Buy',
            'meta_title' => 'Where to Buy SolaSaver',
            'is_active'  => true,
        ]);

        $this->section($page, 'hero', 'Page Hero', [
            'heading' => 'Where to Buy SolaSaver',
        ], [], 1);

        $this->section($page, 'buy_options', 'Buy Options (cards)', [], [
            [
                'image'     => 'img/Find an Electrician.jpg',
                'link_text' => 'Find an Electrician Near You',
                'link_url'  => '/find-electrician',
                'body'      => 'Search for independent licensed electricians in your area who can supply and install SolaSaver.',
            ],
            [
                'image'     => 'img/order-solasaver.jpg',
                'link_text' => 'Order SolaSaver',
                'link_url'  => '#',
                'body'      => 'Order SolaSaver directly from us and have your electrician install it.',
            ],
        ], 2);
    }

    private function seedFindElectrician(): void
    {
        $page = Page::updateOrCreate(['slug' => 'find-electrician'], [
            'title'      => 'Find an Electrician',
            'meta_title' => 'Find an Electrician Near You',
            'is_active'  => true,
        ]);

        // Only the text is CMS-managed. The search form + map are a separate feature.
        $this->section($page, 'hero', 'Page Hero', [
            'heading' => 'Find an Electrician Near You',
            'body'    => 'Electricians listed in the SolaSaver installer network operate as independent contractors and are not employees or agents of SolaSaver. Installation services are provided directly by the electrician.',
        ], [], 1);
    }

    private function seedCompatibility(): void
    {
        $page = Page::updateOrCreate(['slug' => 'system-compatibility'], [
            'title'      => 'System Compatibility',
            'meta_title' => 'System Compatibility',
            'is_active'  => true,
        ]);

        $this->section($page, 'hero', 'Page Hero', [
            'heading' => 'System Compatibility',
            'body'    => 'A smarter, simpler way to use more of your own solar power without complexity, high costs, or ongoing maintenance.',
        ], [], 1);

        $this->section($page, 'checker_intro', 'Checker Intro', [
            'heading'     => 'Will [[SolaSaver]] Work In My Home?',
            'subheading'  => 'Answer a few simple questions to see if SolaSaver may suit your home.',
            'body'        => 'NO PERSONAL DETAILS ARE REQUIRED.',
            'image'       => 'img/Work home left image.png',
            'button_text' => 'Check My Home',
        ], [
            ['body' => 'Whether you already have rooftop solar'],
            ['body' => 'Whether you export excess solar during the day'],
            ['body' => 'Whether you have suitable electrical loads (eg hot water or a pool pump)'],
            ['body' => 'Whether your home is likely to benefit from solar diversion'],
            ['body' => 'What the next step is if your home looks suitable'],
        ], 2);
    }

    private function seedSettings(): void
    {
        $settings = [
            'top_banner'    => 'FREE SHIPPING AUSTRALIA WIDE',
            'contact_phone' => '+01 248 248 2481',
            'contact_email' => 'sales@solasaver.com',
            'facebook_url'  => '#',
            'linkedin_url'  => '#',
            'instagram_url' => '#',
            'youtube_url'   => '#',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}