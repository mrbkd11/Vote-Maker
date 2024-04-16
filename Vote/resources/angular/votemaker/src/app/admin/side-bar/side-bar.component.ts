import { Component, ElementRef, OnInit, Renderer2 } from '@angular/core';

@Component({
  selector: 'app-side-bar',
  templateUrl: './side-bar.component.html',
  styleUrls: ['./side-bar.component.css']
})
export class SideBarComponent implements OnInit {

  constructor(private elementRef: ElementRef, private renderer2: Renderer2) { }
  ngOnInit(): void {
    throw new Error('Method not implemented.');
  }
  LogoUrl: string = "assets/images/SJE_black.png";

  ngAfterViewInit() {
    const allSideMenu = this.elementRef.nativeElement.querySelectorAll('#sidebar .side-menu.top li a');

    allSideMenu.forEach((item: { parentElement: any; addEventListener: (arg0: string, arg1: () => void) => void; }) => {
      const li = item.parentElement;

      item.addEventListener('click', () => {
        allSideMenu.forEach((i: { parentElement: { classList: { remove: (arg0: string) => void; }; }; }) => {
          i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
      })
    });

    const menuBar = this.elementRef.nativeElement.querySelector('#content nav .bx.bx-menu');
    const sidebar = this.elementRef.nativeElement.querySelector('#sidebar');

    menuBar.addEventListener('click', () => {
      sidebar.classList.toggle('hide');
    })
  }
}
