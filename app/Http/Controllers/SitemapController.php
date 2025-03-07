<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Job;
use App\Models\JobSeo;
use App\Models\News;
use App\Models\NewsSeo;
use App\Models\Service;
use App\Models\ServiceSeo;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;


class SitemapController extends Controller
{
    public function index()
    {
        // Create a new sitemap instance
        $sitemap = Sitemap::create();

        // Define the available locales
        $locales = ['en', 'ru', 'hy','es'];

        // Loop through the locales and add the URLs for each language
        foreach ($locales as $locale) {

            $sitemap->add(Url::create("/{$locale}")
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0));

            $about = About::with('localizations')->get();
            foreach ($about as $key => $seo){
                foreach ($seo->localizations as $data) {
                    $sitemap->add(Url::create("/{$locale}/about/{$data->slug}")
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(0.1));
                }
            }

//            $services = Service::with('localizations')->get();
//            foreach ($services as $key => $service){
//                foreach ($service->localizations as $data) {
//                    $sitemap->add(Url::create("/{$locale}/service/{$data->id}/{$data->slug}")
//                        ->setLastModificationDate(now())
//                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//                        ->setPriority(0.2));
//                }
//        }
//            $serviceSeo = ServiceSeo::with('localizations')->get();
//            foreach ($serviceSeo as $key => $seo){
//                foreach ($seo->localizations as $data) {
//                    $sitemap->add(Url::create("/{$locale}/services/{$data->slug}")
//                        ->setLastModificationDate($data->updated_at)
//                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//                        ->setPriority(0.3));
//                }
//            }

//            $news = News::with('localizations')->get();
//            foreach ($news as $key => $new){
//                foreach ($new->localizations as $data) {
//                    $sitemap->add(Url::create("/{$locale}/news/{$data->id}/{$data->slug}")
//                        ->setLastModificationDate(now())
//                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//                        ->setPriority(0.4));
//                }
//            }

//            $newsSeo = NewsSeo::with('localizations')->get();
//            foreach ($newsSeo as $key => $seo){
//                foreach ($seo->localizations as $data) {
//                    $sitemap->add(Url::create("/{$locale}/news/{$data->slug}")
//                        ->setLastModificationDate($data->updated_at)
//                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//                        ->setPriority(0.5));
//                }
//            }

//            $jobs = Job::with('localizations')->get();
//            foreach ($jobs as $key => $job){
//                foreach ($job->localizations as $data) {
//                    $sitemap->add(Url::create("/{$locale}/jobs/{$data->id}/{$data->slug}")
//                        ->setLastModificationDate(now())
//                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//                        ->setPriority(0.6));
//                }
//            }

//            $jobsSeo = JobSeo::with('localizations')->get();
//            foreach ($jobsSeo as $key => $seo){
//                foreach ($seo->localizations as $data) {
//                    $sitemap->add(Url::create("/{$locale}/jobs/{$data->slug}")
//                        ->setLastModificationDate($data->updated_at)
//                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//                        ->setPriority(0.7));
//                }
//            }

            $sitemap->add(Url::create("/{$locale}/partners")
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8));

            $contact = About::with('localizations')->get();
            foreach ($contact as $key => $seo){
                foreach ($seo->localizations as $data) {
                    $sitemap->add(Url::create("/{$locale}/contact/{$data->slug}")
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(0.9));
                }
            }

        }

        // Save the sitemap to public directory
    //   return $sitemap->writeToFile(public_path('sitemap.xml'));
        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');

       // return response()->json(['message' => 'Sitemap generated successfully.']);

    }
}
