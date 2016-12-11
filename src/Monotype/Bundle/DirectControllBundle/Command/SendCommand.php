<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Model\Machine;
use Monotype\Domain\Server\Sender;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SendCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class SendCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('send')
            ->setDescription('...')
            ->addArgument('data', InputArgument::OPTIONAL, 'Data')
            ->addOption('file', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('file')) {
            $data = file_get_contents($input->getArgument('data'));
        } else {
            $data = $input->getArgument('data');
        }

        $output->writeln('Connection start...');

        $reactor = new Sender(new Machine([
            'id' => '1',
            'name' => 'test',
            'protocol' => 'tcp',
            'address' => '192.168.0.114',
            'port' => '4001',
            'location' => 'main'
        ]));

        $reactor->sendAsReact('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae vulputate lacus. Quisque ante arcu, blandit rutrum lacus at, pulvinar luctus ligula. Quisque at est lacus. Nulla sollicitudin mi vel lobortis mollis. Quisque malesuada, arcu at condimentum maximus, leo nunc euismod neque, efficitur bibendum velit quam sed quam. Nulla sodales diam turpis. Aliquam fermentum quis orci a rhoncus. Duis libero quam, scelerisque quis aliquam nec, ultrices a metus. Aenean condimentum erat id justo luctus dictum. Vivamus ac orci magna.

Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque ut leo fermentum sapien faucibus finibus. Maecenas sed pretium libero. Phasellus facilisis elit sagittis enim vulputate, sit amet ullamcorper arcu gravida. Sed hendrerit at velit at feugiat. Fusce imperdiet tellus sed neque auctor tristique. Sed posuere, nulla ut bibendum consequat, dui lectus imperdiet orci, ac sodales mi massa quis urna.

Pellentesque porttitor ipsum dolor, a porta dolor tincidunt sit amet. Donec tellus leo, volutpat eu tempus id, consectetur sed urna. Ut commodo congue blandit. Duis fermentum dui vel nulla tincidunt, eget bibendum purus mattis. Sed faucibus leo sit amet tincidunt gravida. Praesent eu orci velit. Nullam bibendum mi felis, sed sodales mi aliquet eget. Sed fringilla ultricies arcu, a placerat augue ultrices viverra.

Integer volutpat ornare quam quis hendrerit. Nam tempor magna eu ullamcorper tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae dignissim velit, eu mattis nisi. Quisque metus risus, finibus ut pellentesque iaculis, dignissim quis metus. In hac habitasse platea dictumst. Nam et condimentum nisi. Fusce id odio eu justo facilisis ornare ac et massa. Fusce tempor, erat nec convallis sodales, ligula purus laoreet lacus, eu porta ligula justo ut ipsum. Suspendisse potenti. Curabitur quis fermentum ligula, sit amet condimentum lorem.

Praesent interdum leo eget mauris condimentum, lacinia venenatis nunc volutpat. Suspendisse ultricies lacinia tristique. Ut volutpat lorem turpis, vitae mollis urna rutrum id. Aliquam porta ex ac imperdiet euismod. In rhoncus sit amet nisl in maximus. In ut nunc quis metus venenatis porta. Duis quis sem condimentum, malesuada ante vel, gravida lectus. Suspendisse scelerisque egestas risus, vel suscipit elit ultricies sit amet. Quisque nunc lorem, rutrum sed sapien at, tincidunt pretium justo. In tempor velit est, et cursus velit consectetur at. Maecenas mattis aliquet fringilla.

Pellentesque quis felis et leo vestibulum scelerisque ac sed diam. Nullam et pellentesque sem. In lacinia consequat porttitor. Donec et nisi mauris. Vestibulum dapibus tincidunt massa, at ullamcorper justo. Ut et posuere libero. Vestibulum pellentesque ac libero et varius. Proin viverra ligula vitae justo maximus, eget fringilla lectus semper. Aenean malesuada vitae erat sed fermentum.

Aliquam malesuada feugiat magna, maximus accumsan lorem dapibus a. Nunc ac elit erat. Nulla hendrerit libero ante, sed molestie mi tempus quis. In commodo magna ut diam lacinia lacinia. Duis eu pulvinar ipsum. Nulla condimentum, dui non posuere faucibus, ligula leo dapibus eros, in lobortis diam risus hendrerit ligula. Curabitur euismod dui non fringilla pretium. Pellentesque condimentum efficitur ultrices. Etiam diam metus, egestas a dolor eu, cursus dignissim urna. Mauris at vulputate nisl. Duis lacinia leo erat, sed posuere lacus suscipit non. Donec eget hendrerit diam. Pellentesque tincidunt mattis aliquet. Donec aliquet facilisis tortor, consectetur convallis odio varius efficitur.

Nunc aliquet dapibus ultrices. Morbi convallis augue sed nibh placerat, a blandit risus congue. Nullam tempus libero vel purus cursus tincidunt. Nullam pellentesque congue ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas a fringilla ipsum, sed consectetur libero. Vivamus facilisis hendrerit pellentesque. Curabitur non fermentum turpis. Sed sit amet auctor est. Fusce urna justo, accumsan at fermentum nec, consequat sit amet lacus. Phasellus at nisl nec urna vehicula blandit fermentum ac tortor. Morbi sed imperdiet nunc. Sed lacus enim, luctus eget suscipit ac, tempus congue velit. Morbi porttitor pulvinar rhoncus. Integer sem purus, pharetra ac erat non, rutrum imperdiet felis.

Sed elementum interdum nisl ac lacinia. Nam vitae enim ut metus tristique pharetra eu ac leo. Nullam orci erat, placerat ultrices diam faucibus, tempus gravida purus. Vestibulum quis vulputate felis. Nullam pellentesque viverra neque ac finibus. Suspendisse sed pretium felis. Aenean ullamcorper est nisl, in sodales nisi blandit vitae.

Mauris dictum, orci a semper posuere, nulla leo accumsan augue, vel pharetra mi ante in est. Etiam tincidunt dui a vestibulum finibus. Mauris et mi ipsum. Pellentesque iaculis mauris vel felis faucibus ultrices. Pellentesque convallis nunc in blandit finibus. Vestibulum accumsan diam ipsum, nec tincidunt sapien interdum at. Fusce scelerisque mi in massa convallis tempor. Etiam non massa enim. Praesent nec sagittis mauris. Quisque varius lectus placerat libero auctor pretium. Donec sit amet mollis sem, ac efficitur nisi. Duis risus eros, placerat eu magna at, facilisis lobortis mauris. Nam faucibus odio vel enim efficitur, eu vehicula nunc sagittis. Ut at eleifend tortor, quis pulvinar lectus.

Etiam laoreet nec orci convallis lobortis. Nulla feugiat ultrices metus, ut lobortis nibh tristique vel. Mauris in tempor ante. Nulla semper pulvinar iaculis. Pellentesque luctus ligula nec libero pellentesque, a dictum magna convallis. Suspendisse congue hendrerit risus quis finibus. Integer congue nisl ac mattis dignissim. Curabitur at varius ex. Donec in lorem vel est facilisis pretium vel quis lorem. Suspendisse potenti. Phasellus vitae semper est. Donec facilisis ipsum sit amet turpis posuere, ut commodo sem fringilla. Fusce suscipit lacinia mi, sed posuere neque bibendum sed. Suspendisse sit amet nisi eros. Nam mattis, metus nec sodales sollicitudin, ipsum orci facilisis ligula, eget finibus tellus diam euismod justo.

Integer pulvinar ipsum ac felis viverra, eget bibendum nunc rhoncus. Fusce ut turpis sed eros consequat iaculis at in purus. Morbi porttitor gravida lacus quis pulvinar. Ut at blandit turpis. Nam non est id leo luctus dignissim vel at elit. Integer luctus finibus finibus. Donec fermentum nisl augue, nec placerat nisl mollis sit amet. Cras blandit, urna in dictum cursus, arcu velit dictum libero, et tempor turpis diam in purus. Pellentesque aliquet, nunc cursus auctor interdum, ligula felis egestas diam, vel sollicitudin magna leo vel est. Duis tempor lobortis dapibus. Vivamus ut dolor aliquam, ullamcorper arcu imperdiet, scelerisque tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla tellus, placerat et enim nec, eleifend mollis tortor. Etiam ut ipsum bibendum, blandit dui eget, iaculis nisl. Aliquam finibus elit odio, at posuere nulla interdum aliquet. Nunc quis lorem lobortis, blandit urna a, interdum mauris.

Etiam ligula lectus, commodo sit amet porttitor et, cursus in nulla. Praesent commodo feugiat nibh, id molestie orci commodo ac. Aliquam erat volutpat. Ut vitae tempus metus. Quisque fringilla sit amet nulla ut lobortis. Sed et ante nec ex egestas interdum eget a augue. Nulla a tincidunt lacus. Sed varius mauris non risus efficitur pulvinar. Nam sit amet aliquet dolor, vel malesuada augue. Aliquam lacus massa, vulputate ornare placerat vitae, consectetur non ipsum. Praesent massa purus, volutpat venenatis luctus a, facilisis elementum risus. Proin enim diam, accumsan a dignissim non, pellentesque vitae nulla. In sed massa elit.

Nam congue ac urna eleifend tempus. Etiam eget ligula ac lectus pretium luctus ut id arcu. Pellentesque nec sapien sed sapien pellentesque mattis. Vivamus at justo ut nisi hendrerit mattis. Integer tristique est ut velit faucibus, eu facilisis eros porta. Etiam pretium tortor eu lectus iaculis, quis pellentesque magna tempus. Nulla facilisi. Sed finibus ipsum ac ante sodales dictum. Phasellus lacinia eros eu pellentesque sodales. Nam et elementum mauris. Vestibulum congue efficitur lectus at lacinia.

Sed non fringilla nisi. Duis id cursus mi. Donec sit amet sem egestas, fringilla lacus sed, tristique tortor. Cras posuere lectus ac quam bibendum, ullamcorper aliquet urna dictum. Vestibulum in volutpat augue. Vestibulum lobortis dictum ex, maximus vehicula arcu interdum non. Nullam et lorem fermentum, maximus turpis a, egestas purus. Nulla euismod ullamcorper orci, at posuere dui euismod sagittis. Maecenas at dictum turpis, efficitur tristique diam. In ultricies rutrum diam, non ultricies nunc rutrum sed. Quisque placerat elementum augue a sagittis. Vivamus vestibulum feugiat nisi eu fermentum. Quisque imperdiet efficitur velit semper fermentum.

Nunc vestibulum auctor nibh nec ultrices. Duis ut erat semper, sollicitudin sapien sed, faucibus eros. Nulla commodo dui at dolor tincidunt bibendum. Maecenas luctus nisi mollis dictum accumsan. Suspendisse mattis tellus eu nibh posuere ultricies. Aenean lobortis placerat turpis, consequat vestibulum neque feugiat id. Aenean convallis pellentesque risus nec sollicitudin.

Mauris tortor neque, venenatis eget vestibulum non, laoreet in felis. Suspendisse aliquet neque lectus, mattis egestas dolor imperdiet non. In purus lorem, laoreet eu lacus ut, facilisis pretium ligula. Ut fringilla porta odio vitae porta. Vestibulum ut arcu sed est tempus aliquam non vitae libero. Phasellus velit ex, mollis nec ipsum eget, finibus placerat sem. Sed pellentesque rhoncus pellentesque. Morbi et pulvinar odio. Quisque ullamcorper nisl odio, eget mattis metus consectetur ut.

Morbi vulputate orci id erat tempor rutrum. Quisque arcu mauris, finibus nec venenatis nec, pulvinar a felis. Ut id dignissim felis. Aliquam finibus non diam ac eleifend. Aliquam erat volutpat. Nunc hendrerit consequat leo eget auctor. Aenean vitae orci risus.

Nam vestibulum tristique massa, non pellentesque est condimentum malesuada. Donec rutrum sem eu dui blandit gravida. Phasellus congue dolor vitae sapien hendrerit eleifend. Duis ut enim et erat feugiat auctor. Pellentesque vel auctor mauris. Pellentesque maximus mattis arcu, ac convallis libero efficitur ac. Sed maximus fringilla quam, quis congue urna auctor et. In posuere rutrum turpis, at commodo urna egestas quis. Donec molestie turpis bibendum magna commodo iaculis. Sed mattis mollis augue vitae tristique. Curabitur efficitur justo non nunc dignissim, a tincidunt est interdum.

Etiam nibh velit, bibendum id volutpat et, sagittis non nisi. Pellentesque mollis erat non imperdiet tincidunt. Ut risus odio, aliquet consequat mi quis, tempor pulvinar risus. Aliquam pretium magna quis nisi condimentum, vel blandit mauris dictum. Fusce et maximus orci. Morbi sit amet lorem vitae velit luctus venenatis. In pellentesque orci ligula, sit amet vehicula neque dictum eget. Donec id maximus neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras vitae maximus quam, nec sodales magna. Praesent rhoncus, lacus mattis iaculis aliquet, sapien sapien porta velit, vitae molestie ante elit sed sapien. Suspendisse vehicula, urna vitae ullamcorper volutpat, est lacus imperdiet mauris, id pretium nunc dui ut ante. Suspendisse eu mauris luctus, vulputate justo non, dictum leo. Nullam dapibus dignissim elit et facilisis. Quisque ultrices felis non urna tristique hendrerit. Curabitur id vulputate metus, ut sollicitudin massa.

Nam eu leo nec tellus maximus viverra. Phasellus id mi ac elit consectetur aliquet. Donec at mattis nunc. Sed maximus, ipsum eu aliquet scelerisque, odio risus ornare sapien, at ultrices tellus nisl vitae metus. Cras porta justo dui, vitae mattis tellus viverra eget. Nam ut ex orci. Quisque tincidunt tempor dui in ullamcorper. Mauris vehicula facilisis mi, ut eleifend nunc fermentum eget. Quisque mattis porta ipsum, nec luctus ex ultrices vel. Nullam libero urna, aliquet sit amet scelerisque sit amet, porta id ligula. In venenatis a risus at blandit. Sed eget felis sit amet sapien sodales consequat.

Phasellus elementum feugiat sem ut fringilla. Etiam nulla sem, scelerisque non tincidunt eget, maximus at leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas ultricies, magna ac scelerisque lacinia, elit est accumsan dui, in fermentum turpis dui sit amet turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce non tempor neque, eu aliquet ligula. Sed tincidunt convallis quam, ac vestibulum sapien facilisis ac. Nullam nec laoreet nibh. Ut eu mauris semper, varius felis eu, pulvinar mauris. Quisque euismod neque id quam imperdiet, ac viverra lorem gravida. Nam a molestie magna. Nunc condimentum egestas dui sed egestas. Morbi tempor orci at ex vehicula congue. Duis in nisi eu eros dignissim vehicula. Vestibulum non odio eu magna ultricies convallis sed quis nulla. Cras pellentesque nibh in ligula fermentum porta.

Cras mollis tortor ut felis pharetra, nec semper tortor tempor. Sed in mollis eros. Donec sapien augue, aliquam in ultrices vitae, volutpat rutrum sem. Mauris at sodales erat. Vivamus ut ipsum lobortis, vulputate nisl nec, tincidunt purus. In hac habitasse platea dictumst. Nullam tortor metus, fringilla sed molestie ac, tempus quis tellus. Duis molestie eget orci ut consequat. Aliquam egestas, sem sed lobortis euismod, lacus massa interdum sem, id sollicitudin augue justo eu libero. Vivamus iaculis quam ut turpis rhoncus dignissim.

Quisque rhoncus sagittis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus quam vel mauris mattis venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi sed porta justo. Phasellus tincidunt facilisis mi. Sed fringilla, massa id volutpat sollicitudin, augue risus tristique nisi, in pretium urna lectus non leo. Vestibulum suscipit nisl et feugiat sodales. Nullam posuere metus sit amet libero tristique luctus.

Suspendisse dictum eu mauris et porta. Pellentesque efficitur vestibulum egestas. Nullam maximus, tellus ut molestie venenatis, leo mauris ullamcorper magna, sed convallis nunc elit et ex. Curabitur vel neque interdum, elementum odio elementum, dictum quam. Cras imperdiet elit augue, eget tempor dolor finibus non. Vivamus dui purus, ullamcorper eu velit vel, interdum tincidunt arcu. Suspendisse sed augue nec urna laoreet ornare. Morbi sed laoreet ligula. Cras auctor finibus odio, vel pretium augue dapibus id. Duis tristique urna sodales nibh scelerisque mollis ut vel felis. Duis at urna vulputate, feugiat ligula sed, vulputate est. Sed mattis, augue non pretium elementum, purus quam feugiat neque, id finibus justo lorem sit amet dui. Etiam vehicula dignissim nunc, eu ullamcorper purus auctor a.');
    }
}
